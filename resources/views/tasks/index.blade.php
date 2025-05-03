@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Minhas Tarefas</h1>

        <!-- Filtro de Status -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Filtrar Tarefas</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.index') }}" method="GET">
                    <div class="d-flex">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="">Todas</option>
                            <option value="pendente" {{ $selectedStatus === 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="concluída" {{ $selectedStatus === 'concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de Tarefas -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tarefas Atuais</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->titulo }}</td>
                                <td>{{ $task->descricao }}</td>
                                <td>
                                    <span class="badge {{ $task->status == 'concluída' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                <div class="d-flex justify-content-center">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>

        <!-- Formulário para adicionar nova tarefa -->
        <div class="card">
            <div class="card-header">
                <h5>Adicionar Nova Tarefa</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

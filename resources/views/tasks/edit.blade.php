@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tarefa</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $task->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $task->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="pendente" {{ $task->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ $task->status === 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="prioridade" class="form-label">Prioridade</label>
            <select name="prioridade" id="prioridade" class="form-select">
                <option value="baixa" {{ $task->prioridade === 'baixa' ? 'selected' : '' }}>Baixa</option>
                <option value="média" {{ $task->prioridade === 'média' ? 'selected' : '' }}>Média</option>
                <option value="alta" {{ $task->prioridade === 'alta' ? 'selected' : '' }}>Alta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
</div>
@endsection

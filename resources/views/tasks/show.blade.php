@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Tarefa: {{ $task->titulo }}</h1>

    <p><strong>Descrição:</strong> {{ $task->descricao }}</p>
    <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
    <p><strong>Prioridade:</strong> {{ ucfirst($task->prioridade) }}</p>
    <p><strong>Data de Criação:</strong> {{ $task->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection

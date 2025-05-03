<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar todas as tarefas do usuário autenticado
    public function index()
    {
      
        $tasks = auth()->user()->tasks()->get();

       
        return view('tasks.index', compact('tasks'));
    }

    // Criar uma nova tarefa
    public function store(Request $request)
    {
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        
        auth()->user()->tasks()->create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'status' => 'pendente', // ou outro status padrão
        ]);

        // Redireciona de volta para a página de tarefas
        return redirect()->route('tasks.index');
    }

    // Editar uma tarefa existente
    public function update(Request $request, Task $task)
    {
        
        $this->authorize('update', $task);

       
        $task->update($request->all());

       
        return redirect()->route('tasks.index');
    }

    // Excluir uma tarefa
    public function destroy(Task $task)
    {
        
        $this->authorize('delete', $task);

       
        $task->delete();

       
        return redirect()->route('tasks.index');
    }
}

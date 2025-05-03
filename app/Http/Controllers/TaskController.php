<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // Obtém todas as tarefas do usuário autenticado
        $tasks = auth()->user()->tasks()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // Cria a nova tarefa associada ao usuário autenticado
        auth()->user()->tasks()->create($request->all());

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        // Método show agora usa a rota de resource, passando a tarefa
        return view('tasks.show', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Verifica se o usuário pode atualizar a tarefa
        $this->authorize('update', $task);

        // Atualiza a tarefa com os dados recebidos
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        // Passa a tarefa para a view de edição
        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {
        // Verifica se o usuário pode excluir a tarefa
        $this->authorize('delete', $task);

        // Exclui a tarefa
        $task->delete();
        return redirect()->route('tasks.index');
    }
}

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
        
        $tasks = auth()->user()->tasks()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        
        auth()->user()->tasks()->create($request->all());

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        
        return view('tasks.show', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        
        $this->authorize('update', $task);

       
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
       
        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {
     
        $this->authorize('delete', $task);

   
        $task->delete();
        return redirect()->route('tasks.index');
    }
}

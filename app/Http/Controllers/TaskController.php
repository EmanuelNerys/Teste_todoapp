<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
       
        $query = auth()->user()->tasks();
    
       
        if ($request->has('status') && in_array($request->status, ['pendente', 'concluída'])) {
            $query->where('status', $request->status);
        }
    
   
        $tasks = $query->paginate(10); 
    
       
        return view('tasks.index', [
            'tasks' => $tasks,
            'selectedStatus' => $request->status,
        ]);
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

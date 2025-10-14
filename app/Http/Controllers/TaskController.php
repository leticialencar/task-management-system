<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:5',
            'status' => 'required|in:pending,in_progress,completed',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter no mínimo 5 caracteres.',
            'status.required' => 'O status é obrigatório.',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'created_by' => auth()->id(),
        ]);

        try {
             return redirect()->route('dashboard')->with('success', 'Tarefa criada com sucesso!');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao criar a tarefa. Por favor, tente novamente.']);
        }
    }

    public function index(Request $request)
    {
        $query = Task::where('created_by', auth()->id());

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $tasks = $query->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function destroy(Task $task)
    {
    if ($task->created_by !== auth()->id()) {
        return redirect()->route('tasks.index')->withErrors(['error' => 'Você não tem permissão para deletar esta tarefa.']);
    }

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }

    public function edit(Task $task)
    {
        if ($task->created_by !== auth()->id()) {
            return redirect()->route('tasks.index')
                             ->withErrors(['error' => 'Você não possui permissão para editar esta tarefa.']);
        }

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        if ($task->created_by !== auth()->id()) {
            return redirect()->route('tasks.index')
                             ->withErrors(['error' => 'Você não possui permissão para editar esta tarefa.']);
        }

        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|min:5',
            'status' => 'required|in:pending,in_progress,completed',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título deve ter no mínimo 3 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter no mínimo 5 caracteres.',
            'status.required' => 'O status é obrigatório.',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }
}

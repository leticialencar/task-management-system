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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
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

}

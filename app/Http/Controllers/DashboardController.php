<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $total = Task::where('created_by', $userId)->count();
        $completed = Task::where('created_by', $userId)->where('status', 'completed')->count();
        $pending = Task::where('created_by', $userId)->where('status', 'pending')->count();
        $inProgress = Task::where('created_by', $userId)->where('status', 'in_progress')->count();

        $percentages = [
            'Completed' => $total ? ($completed / $total) * 100 : 0,
            'Pending' => $total ? ($pending / $total) * 100 : 0,
            'In Progress' => $total ? ($inProgress / $total) * 100 : 0,
        ];

        $latestTasks = Task::where('created_by', $userId)->latest()->take(5)->get();

        return view('dashboard', compact('percentages', 'latestTasks'));
    }
}

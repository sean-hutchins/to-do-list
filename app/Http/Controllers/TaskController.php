<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('components.pages.tasks', ['tasks' => Task::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validatedTask = $request->validate([
            'name' => 'required|string|max:128',
        ]);

        Task::create($validatedTask);

        return to_route('task.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task) : RedirectResponse
    {
        $validatedTask = $request->validate([
            'complete' => 'required|boolean',
        ]);

        $task->update($validatedTask);

        return to_route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('task.index');
    }
}

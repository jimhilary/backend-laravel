<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::paginate(10); // Paginated task list
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'in:pending,completed',
        ]);

        return Task::create($validated);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'status' => 'in:pending,completed',
        ]);

        $task->update($validated);
        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * Task repository interface.
     */
    protected $tasks;

    /**
     * Create a new task controller instance.
     *
     * @param TaskRepository $tasks
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display the list of tasks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:128',
            'priority' => 'required|integer',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'priority' => $request->priority,
            'notes' => $request->notes,
        ]);

        return redirect('/tasks');
    }

    /**
     * Update an existing task.
     *
     * @param Task $task
     *
     * @return Response
     */
    public function update(Task $task)
    {
        $this->authorize('updateOrDestroy', $task);

        $task->update(request()->validate([
            'title' => 'required|max:128',
            'priority' => 'required|integer',
            'notes' => '',
        ]));

        return redirect('/tasks');
    }

    /**
     * Toggle status.
     *
     * @param Task $task
     *
     * @return Response
     */
    public function updateStatus(Task $task)
    {
        $this->authorize('updateOrDestroy', $task);

        $task->status = !$task->status;
        $task->save();

        return redirect('/tasks');
    }

    /**
     * Delete the specified task.
     *
     * @param Request $request
     * @param Task $task
     *
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('updateOrDestroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

    /**
     * Edit the task.
     *
     * @param Task $task
     *
     * return Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
}

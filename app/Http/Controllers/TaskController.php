<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{

    public function __construct()
    {
        // На будущее
        // $this->middleware('auth');
        // $this->middleware('admin-auth')->only('editUsers');
        // $this->middleware('team-member')->except('editUsers');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $tasks = Task::all() если бы все записи нужно было взять
        // и так же with при retrun юзать
        $tasks = DB::table('tasks')->select('id', 'title', 'description', 'completed', 'created_at')->get();

        return view('tasks.index')->with(['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Task::create(request()->only(['title', 'description']));

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        //
        Task::create($validated);

        // $task->title = $request->input('title');
        // $task->description = $request->input('description');
        // $task->completed = 'Не выполнено';
        // $task->created_at = now();

        // $task->save();

        return redirect()->route('tasks.index')->with('status', 'Новая задача успешно создана!');
    }

    /**
     *
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update($request->only('title', 'description', 'completed'));

        return redirect()->route('tasks.index')->with('status', 'Успешно изменено!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}

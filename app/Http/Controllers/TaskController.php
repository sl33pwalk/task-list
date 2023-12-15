<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{
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
    public function store()
    {
        Task::create(request()->only(['title', 'description']));

        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        // $task->title = $request->input('title');
        // $task->description = $request->input('description');
        // $task->completed = 'Не выполнено';
        // $task->created_at = now();

        // $task->save();

        return redirect()->route('tasks.index')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::find($id);

        dd($task);
        exit();

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}

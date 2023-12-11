<?php

namespace Mudassarali964\Todolist\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mudassarali964\Todolist\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $submit = '';
        return view('todolist::tasks.list', compact('tasks', 'submit'));
    }

    public function create()
    {
        $tasks = Task::all();
        $submit = 'Add';
        return view('todolist::tasks.list', compact('tasks', 'submit'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Task::create($input);
        return redirect()->route('tasks.create');
    }

    public function edit($id)
    {
        $tasks = Task::all();
        $task = $tasks->find($id);
        $submit = 'Update';
        return view('todolist::tasks.list', compact('tasks', 'task', 'submit'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $task = Task::findOrFail($id);
        $task->update($input);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}

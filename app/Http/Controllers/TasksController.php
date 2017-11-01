<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Http\Requests;

class TasksController extends Controller
{
  public function create()
  {
    $priorities = \App\Priority::orderBy('code','asc')->pluck('name', 'code');
    //$priorities = $priorities -> prepend('優先度', '');

    return view('tasks/create')->with('task', new Task())->with('priorities', $priorities);
  }

  public function store(Request $request)
  {
    $task = new Task();
    $task->fill($request->all());
    $task->save();
    return redirect()->route('tasks.index');
  }

  public function index()
  {

      $priorities = \App\Priority::orderBy('code','asc')->pluck('name', 'code');
      $tasks = Task::orderBy('updated_at', 'desc')->get();
      return view('tasks/index')->with('tasks', $tasks)->with('priorities', $priorities);
  }
  public function show($id)
  {
      $task = Task::find($id);
      return view('tasks/show')->with('task', $task);
  }
  public function edit($id)
  {
      $task = Task::find($id);
      $priorities = \App\Priority::orderBy('code','asc')->pluck('name', 'code');
      //$priorities = $priorities -> prepend('優先度', '');
      return view('tasks/edit')->with('task', $task)->with('priorities', $priorities);
  }

  public function update(Request $request, $id)
  {
      $task = Task::find($id);
      $task->fill($request->all());
      $task->save();
      return redirect()->route('tasks.index');
  }

  public function destroy($id)
  {
      $task = Task::find($id);
      $task->delete();
      return redirect()->route('tasks.index');
  }
}

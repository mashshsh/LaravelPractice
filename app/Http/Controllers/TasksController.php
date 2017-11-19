<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Priority;
use App\Http\Requests;

class TasksController extends Controller
{
  public function create()
  {
    $priorities = Priority::orderBy('primary_level','asc')->pluck('name', 'primary_level');
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

      $tasks = Task::orderBy('updated_at', 'desc')->get();
      $priorities = Priority::orderBy('primary_level','asc')->pluck('name', 'primary_level');
      return view('tasks/index')->with('tasks', $tasks);
  }
  public function show($id)
  {

      //$priorities = Priority::orderBy('primary_level','asc')->pluck('name', 'primary_level');
      $task = Task::find($id);
      $priorities = Priority::find($task->primary_level);
      return view('tasks/show')->with('task', $task)->with('priorities', $priorities);
  }
  public function edit($id)
  {
      $task = Task::find($id);
      $priorities = Priority::orderBy('primary_level','asc')->pluck('name', 'primary_level');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
  public function getIndex() {
    return view('todolist.index', [
      'tasks' => Task::orderBy('updated_at', 'desc')->get()
    ]);
  }

  public function getAdminIndex() {
    return view('admin.index', [
      'tasks' => Task::orderBy('updated_at', 'desc')->get()
    ]);
  }

  public function getAdminEdit($id) {
    $task = Task::find($id);
    
    return view('admin.edit', [
      'task' => $task
    ]);
  }

  public function postAdminEdit(Request $req) {
    $this->validate($req, [
      'title' => 'regex:/^.+ .+$/'
    ]);
      
      $task = Task::find($req->input('id'));
      $task->title = $req->input('title');
      $task->save();

    return redirect()->route('adminIndex')->with([
      'info'=>'Successfully updated!'
    ]);
  }

  public function getAdminDelete($id) {
    Task::find($id)->delete();

    return redirect()->route('adminIndex')->with([
        'info'=>'Successfully deleted!'
    ]);
  }

  public function postAdminCreate(Request $req) {
    $this->validate($req, [
        'title' => 'regex:/^.+ .+$/'
    ]);


    $task = new Task([
        'title'=> $req->input('title')
    ]);
    $task->save();

    return redirect()->route('adminIndex')->with([
        'info'=>'Successfully created!'
    ]);
}
}

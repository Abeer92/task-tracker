<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;


class taskController extends Controller
{
    function index($name){
    	return view('abeer', ['name'=>$name]);
    }


    
    
    function view(){
        $tasks=Task::all();
    	return view('viewTask', ['tasks'=>$tasks]);
    }

    
    
    function addTask(){
        return view('addTask');
    }

    
    
    function postNewTask(Request $request){
        $this->validate($request,[
            'name' => 'required|max:30',
            'description'=> 'required|max:100'
            ]);
        $name = $request->get('name');
        $description = $request->get('description');

        $task = new Task;
        $task->name = $name;
        $task->description = $description;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('view');
    }


    
    function deleteTask($id){
        Task::find($id)->delete();
        return back();
    }


    
    function editTask($id){
        $task = Task::find($id);
        $title = 'Edit Task '.$task->name;
        return view('edittask', compact('title','task'));
    }
    

    
    function updateTask(Request $request){
        $this->validate($request,[
            'name' => 'required|max:30',
            'description'=> 'required|max:100'
            ]);
        $name = $request->get('name');
        $description = $request->get('description');
        $id = $request->get('id');

        $task =Task::find($id);
        $task->name = $name;
        $task->description = $description;
        $task->save();

        return redirect('view');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    
    
    function listTasks(){
    	$tasks = Task::all();
    	return response()->json($tasks, 200);
    }

    
    function taskDetails($id){
    	$task = Task::find($id);

    	if (!$task) {
			return response()->json(["error" => "Task not found, $id"], 404);

		}

		return response()->json($task, 200);
    }


    function addTask(Request $request){
    	$this->validate($request,[
            'name' => 'required|max:30',
            'description'=> 'required|max:100'
        ]);
        
        $name = $request->get('name');
        $description = $request->get('description');
        $id = $request->get('user_id');

        $task = new Task;
        $task->name = $name;
        $task->description = $description;
        $task-> $id;

        if(!$task){
            return response()->json(["error" => "Task not found, $id"], 404);
        }

        $task->save();

        return response()->json($task, 201);
    }



    function delete($id){
        $task = Task::find($id);

        if (!$task) {
            return response()->json(["error" => "Task not found, $id"], 404);      
        }

        $task->delete();
        return response()->json([], 200);
    }


    function update(Request $request, $id){
                
        $task = Task::find($id);
        if (!$task) {
            return response()->json(["error" => "Task not found, $id"], 404);      
        }
        $this->validate($request,[
            'name' => 'required|max:30',
            'description'=> 'required|max:100'
        ]);
        $name = $request->get('name');
        $description = $request->get('description');
        $task->name = $name;
        $task->description = $description;
        $task.save();
        return response()->json($task, 200);
    }
}

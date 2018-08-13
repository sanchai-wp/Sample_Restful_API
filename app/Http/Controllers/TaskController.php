<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\TaskModel;
use App\Http\Requests\TaskPostRequest;
use Validator;
use DB;
class TaskController extends Controller
{
    public function index()
    {
        //Get all task
        return TaskModel::all();
    }
    
    public function store(Request $request)
    {
        $id = TaskModel::create($request->all());
        return response()->json(['id' => $id, 'status' => Response::HTTP_CREATED]);
    }
 
    public function update(Request $request, TaskModel $id)
    {
        $id->update($request->all());
        return response()->json(['id' => $id, 'status' => Response::HTTP_OK]);
    }
 
    public function delete(TaskModel $id)
    {
        $id->delete();
        return response()->json(['id' => $id, 'status' => Response::HTTP_OK]);
    }
 
}

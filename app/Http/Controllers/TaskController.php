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
    public function taskValidate($request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|max:50',
            'content' => 'nullable|max:255',
            'status' => 'in:pending,done',
        ]);
        return $validator;
    }

    public function index()
    {
        //Get all task
        return TaskModel::all();
    }
    
    public function store(Request $request)
    {
        $validator = $this->taskValidate($request);
        if ($validator->fails()) {
            //return json_encode($validator->errors()->all());
            return response()->json(['errors' => $validator->errors()->all(), 'status' => Response::HTTP_BAD_REQUEST]);
        }

        $id = TaskModel::create($request->all());
        return response()->json(['id' => $id, 'status' => Response::HTTP_CREATED]);
    }
 
    public function update(Request $request, TaskModel $id)
    {
        $validator = $this->taskValidate($request);
        if ($validator->fails()) {
            //return json_encode($validator->errors()->all());
            return response()->json(['errors' => $validator->errors()->all(), 'status' => Response::HTTP_BAD_REQUEST]);
        }
        
        $id->update($request->all());
        return response()->json(['id' => $id, 'status' => Response::HTTP_OK]);
    }
 
    public function delete(TaskModel $id)
    {
        $id->delete();
        return response()->json(['id' => $id, 'status' => Response::HTTP_OK]);
    }
 
}

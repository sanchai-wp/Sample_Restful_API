<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\TaskModel;
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
        return response()->json(['data' => TaskModel::all(), 'status' => Response::HTTP_OK]);
    }

    public function show($id)
    {
        $result = TaskModel::find($id);
        if (!$result){
            return response()->json([
                'error' => 'Record not found',
            ], 404);
        }
        return response()->json(['data' => $result, 'status' => Response::HTTP_OK]);
    }

    public function store(Request $request)
    {   
        $validator = $this->taskValidate($request);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status' => Response::HTTP_BAD_REQUEST]);
        }

        $data = TaskModel::create($request->all());
        return response()->json(['data' => $data, 'status' => Response::HTTP_CREATED]);
    }
 
    public function update(Request $request, $id)
    {
        $data = TaskModel::find($id);
        if (!$data){
            return response()->json([
                'error' => 'Record not found',
            ], 404);
        }

        if($id){
            $validator = $this->taskValidate($request);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all(), 'status' => Response::HTTP_BAD_REQUEST]);
            }
        }

        $data->update($request->all());
        return response()->json(['data' => $data, 'status' => Response::HTTP_OK]);
    }
 
    public function delete($id)
    {
        $data = TaskModel::find($id);
        if (!$data){
            return response()->json([
                'error' => 'Record not found',
            ], 404);
        }
        $data->delete();
        return response()->json(['data' => $data, 'status' => Response::HTTP_OK]);
    }
}

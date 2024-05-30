<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;

class UserController extends Controller
{
    public function createMessage(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->toArray(),
                'code' => 400
            ]);
        }

        $data = $validator->validated();

        $saved = Message::create($data);

        if($saved){
            return response()->json([
                'message' => 'Message sent successfully',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'Message no sent ',
                'code' => 500
            ]);
        }
    }
}

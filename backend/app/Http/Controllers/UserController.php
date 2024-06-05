<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use App\Models\Order;
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

    public function createOrder(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'integer'],
            'product_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'integer'],
            'email' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'cost' => ['required', 'integer'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Something is wrong',
                'errors' => $validator->errors()->toArray(),
                'code' => 400
            ]);
        }

        $data = $validator->validated();

        $created = Order::create($data);

        if($created){
            return response()->json([
                'message' => 'Order created success',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'Order not created',
                'code' => 500
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;
use App\Models\Order;
use App\Helpers\ResponseHelper;
    // public static function errorRes(string $message = 'Something went wrong',array $errors = [],int $code = 500) {

class ApiController extends Controller
{
    public function CreateUser(Request $request){

       $validator =  Validator::make($request->all(),[
          'name' =>'required',
        //   'email'=>'required|email|Unique:users'
          'email' => 'required|email:rfc,dns|unique:users,email'
       ]);

       if($validator->fails()){
         return response()->json([
            'status' => false,
            'message' =>$validator->errors()->first()
         ]);
       }

       $userData = User::create([
        'name'=>$request->name,
        'email'=>$request->email,

       ]);

         return response()->json([
            'status' => true,
            'message' =>"data created",
            'data'   => $userData,
         ]);




      


    }

    public function getUserorders(Request $request){

      $validator = Validator::make($request->all(),[
          'id' => 'required|exists:users'
      ]);

      if($validator->fails()){
        return ResponseHelper::errorRes('',$validator->errors()->first(),500);
      }
        $data = User::with('orders')->where('id',$request->id)->first();    
      //  $data = User::find(1);
        return ResponseHelper::successRes(true,"user found successfully",$data,200);
        
         
         
    }

    
}

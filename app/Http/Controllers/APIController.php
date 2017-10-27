<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    public function hello(Request $request){
        return response()->json(['msg'=>'hello']);
    }

    public function register(Request $request){
        $user = User::where('email',$request->email)->first();
        if ($user)
            return response()->json(['user'=>'exists'],200);
        $user = new User();
        $user->email = $request->email;
        $user->mobileNumber = $user->phone ;
        $user->fName = $request->fName;
        $user->lName = $request->lName;
        $user->password = encrypt($request->password);
        $user->save();
        return response()->json(['status'=>'success']);
    }

    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if (!$user)
            return response()->json(['email'=>'rejected','password'=>'null','user'=>'null'],200);
        if (!Hash::check($request->password,$user->password))
            return response()->json(['password'=>'rejected','email'=>'null','user'=>'null'],200);
        return response()->json(['user'=>'accepted','password'=>'null','email'=>'null'],200);
    }

    public function placeOrder(Request $request){
        $order = new Order();
        $order->name = $request->customerName;
        $order->sourceAddress = $request->sourceAddress;
        $order->sourceRegion = $request->sourceRegion;
        $order->destinationAddress = $request->destinationAddress;
        $order->destinationRegion = $request->destinationRegion;
        $order->size = (int)$request->size;
        $order->mobileNumber = $request->mobileNumber;
        $order->orderCost = (int)$request->orderCost;
        $order->description = $request->description;
        $order->customerMobileNumber = $request->customerMobileNumber;
        $order->save();
        return response()->json(['status'=>'done'],200);
    }
}

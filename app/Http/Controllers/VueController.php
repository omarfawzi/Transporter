<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Deliveryman;
use App\Http\Requests\RegisterFormRequest;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Facades\Excel;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VueController extends Controller
{
    public function getUser(Request $request)
    {
        $data = [];
        $data['name'] = $request->user()->name;
        $data['email'] = $request->user()->email;
        return response()->json([
            'data' => $data,
        ]);
    }

    public function register(RegisterFormRequest $request){
        Admin::create([
            'name' => $request->json('name'),
            'email' => $request->json('email'),
            'password' => bcrypt($request->json('password')),
        ]);
    }
    public function getSpecificOrder($orderID){
        $order = Order::find($orderID);
        return response()->json(['order'=>$order],200);
    }

    public function cancelOrder($orderID){
        Order::where('orderID',$orderID)->delete();
    }

    public function updateOrder($orderID,Request $request){
        $order = Order::find($orderID);
        $order->name = $request->name;
        $order->sourceAddress = $request->sourceAddress;
        $order->sourceRegion = $request->sourceRegion;
        $order->destinationAddress = $request->destinationAddress;
        $order->destinationRegion = $request->destinationRegion;
        $order->size = $request->size;
        $order->mobileNumber = $request->mobileNumber;
        $order->orderCost = $request->orderCost;
        $order->deliveryCost = $request->deliveryCost;
        $order->customerMobileNumber = $request->customerMobileNumber;
        $order->description = $request->description;
        $order->update();
    }

    public function login(Request $request){
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'), [
                'exp' => Carbon::now()->addWeek()->timestamp,
            ]);
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 401);
        } else {
            $data = [];
            $meta = [];
            $data['name'] = $request->user()->name;
            $meta['token'] = $token;
            return response()->json([
                'data' => $data,
                'meta' => $meta
            ]);
        }
    }

    public function resetPassword(Request $request){
        $response = Password::broker()->sendResetLink(
            $request->only('email')
        );
        return response()->json(['status'=>trans($response)]);
       // $res =  $response == trans($response);
    }

    public function placeOrder(Request $request){
        $order = new Order();
        $order->name = $request->name;
        $order->sourceAddress = $request->sourceAddress;
        $order->sourceRegion = $request->sourceRegion;
        $order->destinationAddress = $request->destinationAddress;
        $order->destinationRegion = $request->destinationRegion;
        $order->size = $request->size;
        $order->mobileNumber = $request->mobileNumber;
        $order->orderCost = $request->orderCost;
        $order->deliveryCost = $request->deliveryCost;
        $order->customerMobileNumber = $request->customerMobileNumber;
        $order->description = $request->description;
        $order->save();
        return response()->json(['status'=>'done'],200);
    }

    public function getOrders(){
        $orders = Order::all();
        return response()->json(['orders'=>$orders],200);
    }

    public function getDeliveryMen(){
        $deliveryMen = Deliveryman::all();
        return response()->json(['deliveryMen'=>$deliveryMen],200);
    }

    public function exportOrders(){
        $orders = Order::get()->toArray();
        Excel::create('All Orders', function($excel) use ($orders) {
            $excel->sheet('mySheet', function($sheet) use ($orders)
            {
                $sheet->fromArray($orders);
            });
        })->download('xlsx');
    }
}

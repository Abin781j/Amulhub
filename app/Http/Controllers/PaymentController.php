<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payment;
use Monolog\SignalHandler;
use Razorpay\Api\Api;
use App\Models\Cart;
use App\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Razorpay\Api\Errors\SignatureVerificationError;
use Session;

class PaymentController extends Controller
{

    public function success(){
        return view('frontend.pages.success');
    }

    public function confirm(){
        return view('frontend.pages.orderconfirm');
    }

    //rzp_test_AoXSJ2bfrov0la,XOdw77j6PRNqiEJvk1gDN6oa
    //Gluvl9s5qfTBfbL1Ar8tCsnG

    public function pay(Request $request){
        $data = $request->all();
        
        $ord_id = $data['ord_id'];
        $quantity = $data['quantity'];
        $user = Order::where('payment_id', $data['razorpay_order_id'])->first();
        //return $user;
        $user->payment_status = 'paid';
        $user->razorpay_id = $data['razorpay_payment_id'];

        $api = new Api('rzp_test_AoXSJ2bfrov0la', 'XOdw77j6PRNqiEJvk1gDN6oa');
        

        try{
            $attributes = array(
                'razorpay_signature' => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id' => $data['razorpay_order_id']
            );
            $ord = $api->utility->verifyPaymentSignature($attributes);
            //dd($ord);
            $success = true;
        }
        catch(SignatureVerificationError $e)
        {
            $succes = false;
        }  
        if($success){
            $user->save();
            Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $ord_id]);
            $p=Cart::select('product_id')->where('order_id', $ord_id)->first();
            //dd($p['product_id']);
            $s=Product::select('stock')->where('id', $p['product_id'])->first();
            $res=$s['stock']-$quantity;
            //dd($res);
            $check = DB::table('products')
            ->where('id', $p['product_id'])
            ->update(array('stock' => $res));
            //dd($check);
            //return redirect()->route('pay.success');      
            request()->session()->flash('success','Your product successfully placed in order');
            return redirect()->route('home');
            }
        else{
            return redirect()->route('pay.error');
        }

    }


    public function error(){
        return view('frontend.pages.error');
    }

}

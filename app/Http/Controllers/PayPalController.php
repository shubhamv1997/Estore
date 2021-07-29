<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\OrderDetail;

class PayPalController extends Controller
{
    public function handlePayment(Request $request)
    {
        $product = [];
        $cartdetail = $request->session()->get('cartdetail');
        if(isset($cartdetail)){
            $product['items'] = [];
            $total= 0;
            foreach($cartdetail as $id => $details){
                $x  = Array(
                
                    'name' => $details['name'],
                    'price' => $details['price'],
                    'desc'  => $details['name'],
                    'qty' => $details['quantity']
                );
                array_push($product['items'],$x);
                $total += $details['price'] * $details['quantity'];
            }
            
            $orderid = $request->session()->get('orderid');
            $product['invoice_id'] = $orderid;
            $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
            $product['return_url'] = "http://localhost:8000/payment-success/{$orderid}";
            $product['cancel_url'] = "http://localhost:8000/cancel-payment/{$orderid}";
            // echo route('rhome'); die();
            $product['total'] = $total;
    
            $paypalModule = new ExpressCheckout;
    
            $res = $paypalModule->setExpressCheckout($product);
            $res = $paypalModule->setExpressCheckout($product, true);
    
            return redirect($res['paypal_link']);
        }
    }
   
    public function paymentCancel($id,Request $request)
    {
        // dd('Your payment has been declend. The payment cancelation page goes here!');
        OrderDetail::where('id', $id)
        ->update(['status' => 'Payment Failed']);
        $request->session()->forget('orderid');
        $request->session()->forget('cartdetail');
        return redirect('myorders');

    }
  
    public function paymentSuccess($id,Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            OrderDetail::where('id', $id)
            ->update(['status' => 'Paid',"is_order_paid"=>1]);
            $request->session()->forget('orderid');
            $request->session()->forget('cartdetail');
            return redirect('myorders');

        }
  
        dd('Error occured!');
    }
}

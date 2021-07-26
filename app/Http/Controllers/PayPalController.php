<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

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
            
    
            $product['invoice_id'] = 100;
            $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
            $product['return_url'] = route('success.payment');
            $product['cancel_url'] = route('cancel.payment');
            $product['total'] = $total;
    
            $paypalModule = new ExpressCheckout;
    
            $res = $paypalModule->setExpressCheckout($product);
            $res = $paypalModule->setExpressCheckout($product, true);
    
            return redirect($res['paypal_link']);
        }
    }
   
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }
  
        dd('Error occured!');
    }
}

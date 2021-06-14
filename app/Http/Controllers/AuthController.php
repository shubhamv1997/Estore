<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $type=$request->type;
        
        
       
        if (Auth::attempt(['email' => $email, 'password' => $password, 'type' => $type])) {
            // Authentication passed...
            if($type=="Admin")
            {
         return redirect('home')->with('Done','Successfully Login as Admin');
            
            }
            elseif($type=="User")
            {
             
           //return redirect('userhome')->with('Done','Successfully Login as User');
            }
            elseif($type=="Vendor")
            {
              
           //return redirect('vhome')->with('Success','Successfully Login as Vendor');
            }
           
            else
            {
                return redirect::back()->withErrors(['msg', "Alert! Something is Wrong."]);
                
            }
           
           


        }
        else{
            return redirect()->back()->with('Done','Alert! Check your credentials.');
            
        }
    }
}

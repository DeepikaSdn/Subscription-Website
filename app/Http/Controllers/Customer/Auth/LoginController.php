<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscribedUser;
use Carbon\Carbon;

class LoginController extends Controller
{
    
    public function  showLoginForm(){
        return view('frontend.login');
    }

    public function login(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:customers,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exists..'
        ]);

        $creds = $request->only('email','password');


        if( Auth::guard('customer')->attempt($creds) ){

          //  $user = Auth::guard('customer')->user();
        $customerId = Auth::guard('customer')->user()->id;
        $user =  SubscribedUser::where('customer_id',$customerId)->first();

        $currentDate = Carbon::now();
        $endDate = Carbon::parse($user->enddate); // Replace with your end date

        
        if ($user && $user->enddate && $currentDate->greaterThan($endDate)) {
            // Subscription has expired
            Auth::guard('customer')->logout();

            return redirect()->route('customer-login')->with('error','Subscription expired');
        }

            return redirect('/')->with('success','Successfully Logged In');
        }else{

            return redirect()->route('customer-login')->with('error','Incorrect credentials');
        }
   }

   public function logout(){
       Auth::guard('customer')->logout();
       return redirect('/');
   }

}

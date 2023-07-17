<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\SubscribedUser;
use App\Models\SubscriptionType;

use Carbon\Carbon;
use http\Env\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class StripeController extends Controller
{

        public function stripe(Request $request)
        {

           $validate = $request->validate([
                    'name'=>'required',
                    'email' => 'required|unique:customers,email',
                    'type'=>'required',
                    'password' => 'required',
                ]);
            $customer =Customer::create([
                'name'=>$request->name,
                'password'=> Hash::make($request->password),
                'payment_status'=>$request->payment_status,
                'email'=>$request->email,
                'subscribe_id'=>$request->type                
            ]);

                $amount = $request->amount;
            
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $session =  \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => "AED",
                        'unit_amount' => $amount * 100,
                        'product_data' => [
                            'name' => 'Registration Fee',
                            'images' => ["image_link1","image_link2"],
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
             
                'success_url' => route('success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('cancel', [], true),
            ]);
    
            $payment = new Payment();
            $payment->status = 0;
            $payment->customer_id = $customer->id;
            $payment->amount = $amount ;
            $payment->session_id = $session->id;
            $payment->subscription_id =$request->type;
            $payment->save();

            return redirect($session->url);

        }
       
       
      

        public function webhook()
        {
            // This is your Stripe CLI webhook secret for testing your endpoint locally.
            $endpoint_secret = env('STRIPE_WEBHOOK_ENDPOINT_SECRET');
    
            $payload = @file_get_contents('php://input');
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $event = null;
    
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload, $sig_header, $endpoint_secret
                );
            } catch (\UnexpectedValueException $e) {
                // Invalid payload
                return response('', 400);
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                // Invalid signature
                return response('', 400);
            }
    
             // Handle the event
            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
    
                    $payment = Payment::where('session_id', $session->id)->first();
                    if ($payment && $payment->status === 0) {
                        $payment->status = 1;
                        $payment->save();

                        Customer::where(['id'=>$payment->customer_id])->update(['payment_status'=>1]);

                        // Send email to customer
                    }
    
                // ... handle other event types
                default:
                    echo 'Received unknown event type ' . $event->type;
            }
    
            return response('');
        }

        public function success(Request $request)
        {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $sessionId = $request->get('session_id');

            
                $session = \Stripe\Checkout\Session::retrieve($sessionId);            

               
                $payment = Payment::where('session_id', $session->id)->first(); 
               
                if ($payment->status == 0) {
                    $payment->status = 1;
                    $payment->save();
                    //--webhook event--//
                    Customer::where(['id'=>$payment->customer_id])->update(['payment_status'=>1]);
                    //---//
                    $plan =SubscriptionType::where('id',$payment->subscription_id)->first();
                    $startDate =Carbon::now()->format('Y-m-d');
                    $enddate=Carbon::now()->addDays($plan->days);
                    SubscribedUser::create([
                        'customer_id' =>$payment->customer_id,
                        'subscription_id'=>$payment->subscription_id,
                        'startdate'=>$startDate,
                        'enddate'=>$enddate,
                        'status'=>1
                    ]);
                }
    
                return view('frontend.payment_success');
           
        }
    
        public function cancel()
        {
    
        }
    
    
    
    }

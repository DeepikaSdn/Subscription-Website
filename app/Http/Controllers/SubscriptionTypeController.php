<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubscriptionType;
use App\Notifications\SubscriptionTypeAddNotification;

class SubscriptionTypeController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:subscription-type-list|subscription-type-create|subscription-type-edit|subscription-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:subscription-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:subscription-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subscription-type-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $types = SubscriptionType::orderBy('id','DESC')->paginate(5);
        return view('subscription.index',compact('types'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscription.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'type' => 'required',
            'amount' => 'required',
            'days' =>'required',
            'description' =>'required'
        ]);
    
        $userID = auth()->user()->id;
        $input = [ 'type' => $request->type,
                    'amount'=>$request->amount,
                    'description'=>$request->description,
                    'days' =>$request->days,
                    'status' =>$request->status,
                    'createdby'=>$userID 
                ];
       $subscriptiontype = SubscriptionType::create($input);
    
        $subscriptiontype->notify(new SubscriptionTypeAddNotification());

        return redirect()->route('subscription_type.index')
                        ->with('success','Subscription Type created successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscriptionType $subscription_type)
    {
        return view('subscription.edit',compact('subscription_type'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubscriptionType $subscription_type)
    {
        request()->validate([
            'type' => 'required',
            'amount' => 'required',
            'days' =>'required',
            'description' =>'required'


        ]);
        $userID = auth()->user()->id;

        $input = ['type' => $request->type,
        'amount'=>$request->amount,
        'days' =>$request->days,
        'status' =>$request->status,
        'description' =>$request->description,

        'createdby'=>$userID];
        $subscription_type->update($request->all());
    
        return redirect()->route('subscription_type.index')
                        ->with('success','SubscriptionType updated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscriptionType $subscription_type)
    {
        $subscription_type->delete();
    
        return redirect()->route('subscription_type.index')
                        ->with('success','SubscriptionType deleted successfully');
   
    }
}

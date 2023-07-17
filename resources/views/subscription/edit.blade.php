@extends('layouts.master')




{{-- Page Content--}}
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Subscription Type</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Subscription Type</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="card p-3">
            <form action="{{route('subscription_type.update',$subscription_type->id)}}" id="subscriptiontypeForm"
                enctype="multipart/form-data" method="POST">
                @csrf
                {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        
                        <label for="selectShedule" class="mb-2">Type</label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ $subscription_type->type }}" placeholder="Enter the product name"/>
                      </div>
                </div>
                
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        
                        <label for="selectShedule" class="mb-2">Days</label>
                        <input type="number" class="form-control" name="days" id="days" value="{{ $subscription_type->days }}" placeholder="Enter the product name"/>
                      </div>
                </div>
                
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="selectShedule" class="mb-2">Amount</label>
                        <input name="amount" id="amount" type="number" class="form-control" value="{{ $subscription_type->amount }}" autocomplete="off" />

                      </div>
                </div>
                
        
        <div class="col-md-6 mb-2">
        <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description"  type="text" class="form-control" autocomplete="off" >{{$subscription_type->description}}</textarea>
        </div>
        </div>
    
        
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="team2" class="mb-2">Status</label>
                        <select class="form-control" name="status" id="status">
                          <option value="1" @if($subscription_type->status == 1) selected="selected" @endif >Active</option>
                         <option value="0" @if($subscription_type->status == 0) selected="selected" @endif >Inactive</option>
                        </select>
                      </div>
                </div>
               
       </div>
               
      
              
            
            <hr>
            <div class="col-md-6">

                    <button type="submit" class="btn btn-success">Submit</button>
          
             
                    <a href="{{route('subscription_type.index')}}" class="btn btn-outline-danger">Back</a>
                
            </div>
            
            </form>
        </div>
    </div>
</main>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{asset('custom-assets/subscription_type/edit.js')}}"></script>
@endsection
@extends('layouts.master')


@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    
<div class="row">
    <div class="card">
        <div class="cardbody">

<div class="col-lg-12 margin-tb">
<div class="pull-left">
    <h6 class="card-title mb-2 bor-bot-wpad">Add Subscription Type</h6>
</div>

</div>

@if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('success') }}</li>
        </ul>
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('subscription_type.store') }}" id="subscription_typeForm" enctype="multipart/form-data" method="POST">
    @csrf
<div class="row">

<div class="col-md-6 mb-2">
<div class="form-group">
<label>Type</label>
<input name="type" id="type" class="form-control" autocomplete="off" /></div>
</div>

<div class="col-md-6 mb-2">
<div class="form-group">
<label>Days</label>
<input name="days" id="days" class="form-control"  type="number" autocomplete="off" /></div>
</div>

    <div class="col-md-6 mb-2">
        <div class="form-group">
        <label>Amount</label>
        <input name="amount" id="amount"  type="number" class="form-control" autocomplete="off" />
        </div>
        </div>
       
        <div class="col-md-6 mb-2">
        <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description"  type="text" class="form-control" autocomplete="off" ></textarea>
        </div>
        </div>
    
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="team2" class="mb-2">Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="1" >Active</option>
                 <option value="0" >Inactive</option>
                </select>
              </div>
        </div>
</div>
<div class="col-md-6 " align="right">
<input name="createdby" type="hidden"  id="createdby" class="form-control" autocomplete="off"   /></div>

<input  type="submit" value="Submit" class="btn btn-success">
<a class="btn btn-outline-danger" href="{{ route('subscription_type.index')}}"> Back</a>
</div>
</div>
</form>
</div>



    
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{asset('custom-assets/subscription_type/create.js')}}"></script>
@endsection


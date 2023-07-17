@extends('frontend.main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .invalid {
    color:#FF0000;  /* red */
}

</style>
 @section('content')>
  
    <div class="container">
        <div class="row">
            <h1>Registration Form</h1>
        </div><div class="row">
        @if(Session::has('errors'))
        <div class="alert alert-danger">
            {{ Session::get('errors') }}
                    @php
                Session::forget('errors');
            @endphp
        </div>
        @endif
    <form id="registerForm" class="row form"  method="POST" action="{{ route('stripe') }}">
        @csrf
    <div class="md-6">
        <label>Name</label>
        <input type="text" class="form-control" value="" name="name">
    </div>
    <div class="md-6">
        <label>Email</label>
        <input type="email" name="mailid" value="" class="form-control">
    </div>
    <div class="md-6">
        <label>Password</label>
        <input type="text" name="password" value=""  class="form-control">
    </div>
   
    <div class="md-6">
        <label>Subscription Plans</label>
        <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1">
  <label class="form-check-label" for="flexRadioDefault1">
    Basic
  </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
Primary  </label>
</div>
    </div>
    
    <div class="md-6">
        <lable>Registraton Fee</label>
        <input readonly class="form-control-plaintext"  value="100 AED" >
    </div>
    <input type="hidden" name="amount" value="100">
    <input type="hidden" name="payment_status" value="0">

    <button type="submit" class="btn btn-primary">Pay Now</button>
    </form>
</div></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $().ready(function () {
 
            $("#registerForm").validate({
                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                    name: "required",
                    gender: "required",
                    mobile:{
                        required:true,
                        minlength:12,
                        maxlength:13,
                    },  
                                     
                    mailid: {
                        required: true,
                        email: true
                    },
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    name: " Please enter your name",
                    gender: " Please select your gender",
                    mailid: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                    },

                    mobile: {
                        required: " Please enter a mobile number",
                    },
                    address:"Please enter your address"
                   
                },
                errorClass: "invalid",
                validClass: "success",


                submitHandler: function(form) {
                    form.submit();
                    //   $(form).ajaxSubmit();
                }

            });
        });
 
    </script>

</body>
</html>
 @endsection
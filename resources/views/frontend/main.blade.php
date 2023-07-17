@include('frontend.layouts.header')
<body>


  <main id="main">
        @yield('content')   

   
   
  </main><!-- End #main -->

  @include('frontend.layouts.footer')

  </div>
  </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" ></script>
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @yield('script')
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')

    <script>

      $(document).ready(function(){
  
        // On load Toast

        @if(Session::has('success'))

toastr['success'](

  '{{Session::get('success')}}',

  'Success!',

  {

    closeButton: true,

    tapToDismiss: false,

  }

);

@endif
  
        @if(Session::has('error'))
  

        
toastr['error'](

'{{Session::get('error')}}',

'Sorry!',

{

  closeButton: true,

  tapToDismiss: false,

}
);
       
         
  
          @endif
  
        @if(Session::has('warning'))
  
         
  
          toastr.warning({
  
          title: "Warning",
  
          text: "Something went wrong!",
  
          icon: "warning",
  
          button: "ok",
  
          });
  
          @endif
  
      
       
  
          });
  
        </script>
</body>
</html>
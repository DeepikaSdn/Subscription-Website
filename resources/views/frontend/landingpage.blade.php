 @extends('frontend.main')
 
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/landing/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Grow By Reading..</h2>
                <p class="animate__animated animate__fadeInUp"></p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

       
        </div>

        
      </div>
    </div>
  </section><!-- End Hero -->

 @section('content')

 <!-- ======= Pricing Section ======= -->
 <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Subscription Plans</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            @foreach($plans as $plan)
          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3>{{$plan->type}}</h3>
              <h4><sup>AED</sup>{{$plan->amount}}</h4>
              <ul>
                <li>{{$plan->days}} Days Plan</li>
                <li> {{$plan->description}}</li>
               </ul>
             </div>
          </div>
            @endforeach
          
        </div>

      </div>
    </section><!-- End Pricing Section -->
@endsection
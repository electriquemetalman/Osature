
@include('sections/header', compact('users'))



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Bettter Trading Experience With Osature</h1>
          <h2>Welcome to Osature invesment, your best partner in automatic trading and Crypto currency</h2>
          <div><a href="#about" class="btn-get-started scrollto">About US</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="image/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
        @include('sections/about', compact('AboutList'))
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">232</span>
            <p>User account</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">521</span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>visiteurs</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,463</span>
            <p>Satisfaction</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Sinvesment Section ======= -->
         @include('sections/invesment', compact('InvestmentList'))
    <!-- End invesment Section -->

    <!-- ======= Faq Section ======= -->
        @include('sections/faq', compact('FaqList'))

      @include('sections/contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('sections/footer')
  <!-- End Footer -->

 @include('sections/js')




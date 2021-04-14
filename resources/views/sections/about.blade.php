<section id="about" class="features">
      <div class="container"  data-aos="fade-up">
        <div class="section-title">
          <h2 class="menus">About Us</h2>
            <p>
                Osature Investment is a commercial organization created in 2019 that combines professional trading activity in the forex markets, the development of artificial intelligence, as well as technologies related to cryptocurrency. <br><br>

                We are committed to expanding activities in areas that will matter in the decades to come. Mobilizing resources from corporate investment activities and generating liquid profits for partners and organizations.
            </p>
        </div><br/><br/>

        
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <!--<i class="bx bx-receipt"></i>-->
              @foreach ($AboutList as $about)
                <h4 style="color:rgba(3, 1, 75, 0.9)">Why Us</h4><br/><br/>
                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/security.png" alt="" style="height: 65px; width: 65px">Security</h6>
                    <p> {{ $about->security }} </p><br/><br/>

                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/guarantee.png" alt="" style="height: 65px; width: 65px">Guarantee</h6>
                    <p> {{ $about->guarantee }} </p><br/><br/>

                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/income.png" alt="" style="height: 65px; width: 65px">One-off income</h6>
                    <p> {{ $about->income }} </p>
                </div><br/><br/>
                <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                <!--<i class="bx bx-cube-alt"></i>-->
                <h4 style="color:rgba(3, 1, 75, 0.9)">How we work</h4>
                <p>{{ $about->howework }}</p>
                </div>
              @endforeach
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="image/image about.jpg" alt="" class="img-fluid" style="height: 700px; ">
          </div>
        </div>

      </div>
</section>

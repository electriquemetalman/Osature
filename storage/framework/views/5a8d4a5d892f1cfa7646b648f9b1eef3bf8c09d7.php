<section id="about" class="features">
      <div class="container"  data-aos="fade-up">
        <div class="section-title">
          <h2 class="menus">About Us</h2>
          <p>Osature is an investment company that has been developed by industry experts and serves as a universal portfolio for investor.
The trading process includes algorithms, over 300 trades per second on exchanges using private software, and talented Osature traders.<br><br>

Purchase sale of currency pairs, then in the next step the amount of profit received from transactions is distributed, after which it is transferred to the accounts of the company for further distribution among investors to personal account available in the account customer's staff</p>
        </div><br/><br/>

<<<<<<< HEAD
        
=======
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <!--<i class="bx bx-receipt"></i>-->
              <?php $__currentLoopData = $AboutList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h4 style="color:rgba(3, 1, 75, 0.9)">Why Us</h4><br/><br/>
                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/security.png" alt="" style="height: 65px; width: 65px">Security</h6>
                    <p> <?php echo e($about->security); ?> </p><br/><br/>

                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/guarantee.png" alt="" style="height: 65px; width: 65px">Guarantee</h6>
                    <p> <?php echo e($about->guarantee); ?> </p><br/><br/>

                <h6 style="color:rgba(3, 1, 75, 0.9); font-weight:bold"><img src="image/income.png" alt="" style="height: 65px; width: 65px">One-off income</h6>
                    <p> <?php echo e($about->income); ?> </p>
                </div><br/><br/>
                <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                <!--<i class="bx bx-cube-alt"></i>-->
                <h4 style="color:rgba(3, 1, 75, 0.9)">How we work</h4>
                <p><?php echo e($about->howework); ?></p>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="image/image about.jpg" alt="" class="img-fluid" style="height: 700px; ">
          </div>
        </div>

      </div>
</section>
<?php /**PATH C:\laragon\www\Osature\resources\views/sections/about.blade.php ENDPATH**/ ?>
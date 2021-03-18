<section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              @if (sizeOf($contact)==0)
              <p>Pas encore définie</p>
                  
              @else
              <p>{{ $contact->adresse }}</p>
                  
              @endif
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              @if (sizeOf($contact)==0)
              <p>Pas encore définie</p>
                  
              @else
              <p>{{ $contact->email }}</p>
                  
              @endif
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              @if (sizeOf($contact)==0)
              <p>Pas encore définie</p>
                  
              @else
              <p>{{ $contact->telephone }}</p>
                  
              @endif
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">

            @if (sizeOf($contact)==0)
            <iframe class="mb-4 mb-lg-0" src="" frameborder="1" style="border:1; width: 100%; height: 384px;" allowfullscreen></iframe>

              @else
              <iframe class="mb-4 mb-lg-0" src="{{ $contact->localisation }}" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>

                  
              @endif
          </div>

          <div class="col-lg-6">
            <form action="{{ route('sendMessage') }}" method="post" role="form" >
              @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              
              <div class="text-center"><button type="submit" class="btn btn-success">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>

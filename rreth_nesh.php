<?php
    include 'eat_parts/header.php';
?>


<!-- ==============START OF ABOUT ============= -->
  <div id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6 image-block-item">
          <img src="images/foodmania.jpg">
        </div>

        <div class="col-md-6 tabs-block-item">
          <ul class="nav nav-tabs nav-justified" id="myTabs" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#who" id="who-tab" role="tab" data-toggle="tab" aria-controls="who" aria-expanded="true">Who We Are</a>
                  </li>
                  <li role="presentation" class="">
                    <a href="#why" role="tab" id="why-tab" data-toggle="tab" aria-controls="why" aria-expanded="false">Why Choose Us</a>
                  </li>
              </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active in" role="tabpanel" id="who" aria-labelledby="who-tab">
              <h2 class="marg-40-btm">Who are we?</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat.</p>
                      <p> Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
                      <!-- <p><a href="#" class="button tab-content-btn"><i class="fa fa-wrench"></i> Learn Our Service</a></p> -->
            </div>
            <div class="tab-pane fade" role="tabpanel" id="why" aria-labelledby="why-tab">
                      <h2 class="marg-40-btm">Why Choose Us?</h2>
                      <div class="service-item service-item-icon-left">
                        <div class="service-item-icon">
                          <i class="fa fa-bolt fa-3x" aria-hidden="true"></i>
                        </div><!-- .service-item-icon -->
                        <h4 class="service-item-title">We Are Passionate</h4>
                        <p>We have a proven record of accomplishment and are a reputable company in the California.</p>
                      </div>
                      <div class="service-item service-item-icon-left">
                        <div class="service-item-icon">
                          <i class="fa fa-heart-o fa-3x" aria-hidden="true"></i>
                        </div><!-- .service-item-icon -->
                        <h4 class="service-item-title">Honest and Dependable</h4>
                        <p>For us, honesty is the only policy and we strive to complete all projects with integrity.</p>
                      </div>
                      <p><a class="button tab-content-btn" href="http://www.youtube.com/watch?v=Og879fOk6DQ"><i class="fa fa-play-circle-o"></i> Watch Overview</a></p>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- ==============END OF ABOUT ============= -->








<!-- ==========START OF ADDITIONAL INFO============ -->
  <div class="additional-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 contact-item">
          <div class="contact-item-icon">
            <i class="fa fa-phone"></i>
          </div>
          <div class="contact-item-title">
            <h4>PHONE NUMBER:</h4>
          </div>
          <div class="contact-item-content">
            <p>0-274-441-5005</p>
          </div>
        </div>
        <div class="col-sm-3 contact-item">
          <div class="contact-item-icon">
            <i class="fa fa-envelope-o"></i>
          </div>
          <div class="contact-item-title">
            <h4>EMAIL ADDRESS::</h4>
          </div>
          <div class="contact-item-content">
            <p>hello@construction.me</p>
          </div>
        </div>
        <div class="col-sm-3 contact-item">
          <div class="contact-item-icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <div class="contact-item-title">
            <h4>OFFICE ADDRESS:</h4>
          </div>
          <div class="contact-item-content">
            <p>5252 E Walnut Ave, Orange, CA</p>
          </div>
        </div>
        <div class="col-sm-3 contact-item">
          <div class="contact-item-icon">
            <i class="fa fa-clock-o"></i>
          </div>
          <div class="contact-item-title">
            <h4>OPENING TIMES:</h4>
          </div>
          <div class="contact-item-content">
            <p>Mon - Sat: 7.00 - 16:00</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- ============END OF ADDITIONAL INFO========== -->

<div class="margin-bottom"></div>



<!-- =========START OF CONTACT======= -->
    <div id="contact" class="contact image-block">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-offset-2 col-md-4">
            <form class="contact-form">
              <div class="form-group">
                <label for="contact_name">Name</label>
                <input type="text" class="form-control form-bordered" id="contact_name">
              </div>
              <div class="form-group">
                <label for="contact_email" class="form-label">Email</label>
                <input type="email" class="form-control form-bordered" id="contact_email">
              </div>
              <div class="form-group">
                <label for="contact_message" class="form-label">Message</label>
                <textarea class="form-control form-bordered" rows="6" id="contact_message"></textarea>
              </div>
              <button type="submit" class="btn button btn-squar btn-roundede">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- =========END OF CONTACT======= -->
<div class="margin-bottom"></div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; Copyright @ 2017</p>
                </div>
            </div>
        </div>
    </footer>








<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script src="js/filter.js"></script>


</script>
</body>
</html>
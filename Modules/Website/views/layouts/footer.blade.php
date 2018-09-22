 <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
         
           <section class="content-section bg-primary text-white" style="background: #1d809f!important">
      <div class="container text-center">
        <h2 class="mb-4" style="text-decoration:underline;">About Nuvka</h2>
        <div style="text-align: center;font-size:20px; padding: 10px">
          {!! $setting->website_description??$setting->website_title !!}
        </div>
      </div>
    </section> 
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inveRSe"></i> </span> </div>
                <div class="media-body">
                  <p>  
                  {!!  $setting->company_address??'Samstipur' !!}
                  </p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inveRSe"></i> </span> </div>
                <div class="media-body">
                  <p> 
                  {{$setting->phone??$setting->mobile}}

                    </p> 
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inveRSe"></i> </span> </div>
                <div class="media-body"> <span><a href="#"> {{$setting->website_email??'info@nuvka.in'}}</a></span> </div>
              </li>
               <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inveRSe"></i> </span> </div>
                <div class="media-body"> <span><a href="#">
                  {{url('/')}}

                </a></span> </div>
              </li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="fiRSt"><a href="{{ url('myaccount') }}" title="Contact us">My Account</a></li>
              <li><a href="{{ url('myaccount') }}" title="About us">Order History</a></li>
              <li><a href="{{url('faq')}}" title="faq">FAQ</a></li> 
              <li class="last"><a href="{{ url('contact') }}" title="Where is my order?">Help Center</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Corporation</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="fiRSt"><a title="Your Account" href="##">About us</a></li>
              <li><a title="Information" href="{{ url('contact') }}">Customer Service</a></li>
              <li><a title="Addresses" href="{{ url('contact') }}">Company</a></li> 
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Why Choose Us</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li><a href="##" title="Blog">Blog</a></li>
              <li><a href="##" title="Company">Company</a></li> 
              <li class=" last"><a href="{{ url('contact') }}" title="SupplieRS">Contact Us</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="##" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="##" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="##" title="GooglePlus"></a></li> 
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('public/enduser/assets/images/payments/1.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/2.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/3.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/4.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/5.png') }}" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>

    <script type="text/javascript">
        
        var url= "{{ url('/') }}";

    </script>
    <!-- ============================================================= FOOTER : END============================================================= --> 

    <!-- For demo purposes – can be removed on production --> 

    <!-- For demo purposes – can be removed on production : End --> 

    <!-- JavaScripts placed at the end of the document so the pages load faster --> 
    <script src="{{ asset('public/enduser/assets/js/jquery-1.11.1.min.js') }}"></script> 
     <script src="{{ asset('public/enduser/assets/js/bootstrap.min.js') }}"></script> 
     <script src="{{ asset('public/enduser/assets/js/owl.carousel.min.js') }}"></script> 
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    
    
    <script type="text/javascript">
      
      $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
      });
    </script>

   
    <script src="{{ asset('public/enduser/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/echo.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/jquery.easing-1.3.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/bootstrap-slider.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/jquery.rateit.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('public/enduser/assets/js/lightbox.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/bootstrap-select.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/wow.min.js') }}"></script> 
    <script src="{{ asset('public/enduser/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootbox.js') }}"></script>
    <script src="{{ asset('public/assets/js/common.js') }}"></script> 



    
  </body>
</html>

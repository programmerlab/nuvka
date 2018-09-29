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
                <div class="media-body" style="color: #fff">
                  {!!  $setting->company_address??'Samstipur' !!}
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inveRSe"></i> </span> </div>
                <div class="media-body" style="color: #fff">
                  {{$setting->phone??$setting->mobile}}

                </div>
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
             @foreach($page_menu as  $key => $result)

                @if($key<4)
                <li class="fiRSt">
                  <a title="Your Account" style="color: #fff" href="{{url('page/'.$result->slug)}}"> {{ ucfirst($result->title)}} </a>
                </li>
                @endif
              @endforeach
             
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">  <p style="height: 10px;"></p></h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>

              @foreach($page_menu as  $key => $result)

                @if($key>3)
                <li class="fiRSt">
                  <a style="color: #fff" title="{{$result->slug}}" href="{{url('page/'.$result->slug)}}"> {{ ucfirst($result->title)}} </a>
                </li>
                @endif
              @endforeach
             
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Working Hours</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled' style="color: #fff">
               
                
                {!! $setting->company_timing??'' !!}  
                
               
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

          <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="{{$setting->fb_id??'#'}}" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{$setting->twitter_id??'#'}}" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="{{$setting->google_plus??'#'}}" title="GooglePlus"></a></li>
        
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="{{$setting->pintrest??'#'}}" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{$setting->linkedin_url??'#'}}" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{$setting->youtube??'#'}}" title="Youtube"></a></li>


        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('public/enduser/assets/images/payments/1.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/2.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/3.png') }}" alt=""></li>
            <li><img src="{{ asset('public/enduser/assets/images/payments/4.png') }}" alt=""></li> 
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

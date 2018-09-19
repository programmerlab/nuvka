   <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
           
            <!-- /.item -->
          
          @if(file_exists(storage_path('uploads/img/'.$setting->banner_image1)))
            <div class="item" style="background-image: url({{ asset('storage/uploads/img/'.$setting->banner_image1)}});">
              @else
              <div class="item" style="background-image: url({{ asset('public/enduser/assets/images/sliders/02.jpg')}});">
              
              @endif

              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                 
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>

               @if(file_exists(storage_path('uploads/img/'.$setting->banner_image2)))
            <div class="item" style="background-image: url({{ asset('storage/uploads/img/'.$setting->banner_image3)}});">
              @else
              <div class="item" style="background-image: url({{ asset('public/enduser/assets/images/sliders/01.jpg')}});">
              
              @endif
              <div class="container-fluid">
              
              </div>
              <!-- /.container-fluid --> 
            </div>
            
             @if(file_exists(storage_path('uploads/img/'.$setting->banner_image3)))
            <div class="item" style="background-image: url({{ asset('storage/uploads/img/'.$setting->banner_image3)}});">
              @else
              <div class="item" style="background-image: url({{ asset('public/enduser/assets/images/sliders/03.jpg')}});">
              
              @endif
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                 
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div> 


            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">With in 7 Days</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">No Minumum Order</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Call us for discount </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
   </div>
  
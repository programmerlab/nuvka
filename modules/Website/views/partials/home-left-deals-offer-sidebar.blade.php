 <!--  SIDEBAR  -->
  <div class="col-xs-12 col-sm-12 col-md-3 sidebar">  
    
    <!-- ============================================== HOT DEALS ============================================== -->
 <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
      <h3 class="section-title">hot deals</h3>
      <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        
       @foreach($hot_products as $result)
        <div class="item">
          <div class="products">
            <div class="hot-deal-wrapper">
              <div class="image">
              <a href="{{$result->url}}"> 
               <img style="height: 200px;" src="{{ asset('storage/uploads/products/'. $result->photo) }}" alt="{{ $result->product_title }}"> </a> </div>
              <div class="sale-offer-tag"><span>10%<br>
                off</span></div> 
            </div>
            <!-- /.hot-deal-wrapper -->
            
             <div class="product-info text-left m-t-20">
                <h3 class="name"><a href="{{$result->url}}">{{ $result->product_title }}</a> ({{ $result->views+100 }} views) </h3>
                <div class="rating rateit-small"></div>
                <div class="product-price"> 
                <span class="price"> INR  {{ $result->price - ($result->price*$result->discount)/100 }} </span> 
                <span class="price-before-discount">INR {{ $result->price }}</span> 
                </div>
                <!-- /.product-price -->  
              </div>
            <!-- /.product-info -->
            
            <div class="cart clearfix animate-effect">
              <div class="action">
                <a href="{{ url(str_slug($result->product_title,'-').'/addToCart/'.$result->id) }}" id="addToCart" > 
                  <div class="add-cart-button btn-group">
                     <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                    <button class="btn btn-primary cart-btn" type="button"> 
                       Add to cart
                    </button>  
                </div>
                </a>
              </div>
              <!-- /.action --> 
            </div>
            <!-- /.cart --> 
          </div>
        </div>
        @endforeach
         
      </div>
      <!-- /.sidebar-widget --> 
    </div>
    <!--   HOT DEALS: END =========== ========= --> 
    
    <!-- ======= SPECIAL OFFER =========== -->
    
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
      <h3 class="section-title">Special Offer</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
          @foreach($special_deals as $deal)
           <div class="item">
              <div class="products special-product">
                <div class="product">
                  <div class="product-micro">
                    <div class="row product-micro-row">
                      <div class="col col-xs-5">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url(str_slug($deal->product_title,'-').'/addToCart/'.$deal->id) }}"> <img src="{{ asset('storage/uploads/products/'. $deal->photo) }}" alt=""> </a> </div>
                          <!-- /.image --> 
                          
                        </div>
                        <!-- /.product-image --> 
                      </div>
                      <!-- /.col -->
                      <div class="col col-xs-7">
                        <div class="product-info">
                          <h3 class="name"><a href="{{ url(str_slug($deal->product_title,'-').'/addToCart/'.$deal->id) }}">{{ $deal->product_title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="product-price"> <span class="price"> INR {{$deal->price}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.product-micro-row --> 
                  </div>
                  <!-- /.product-micro --> 
                  
                </div> 
              </div>
          </div> 
          @endforeach

        </div>
      </div>
      <!-- /.sidebar-widget-body --> 
    </div>
    <!-- /.sidebar-widget --> 
    <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
   
    <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
    <!-- ============================================== SPECIAL DEALS ============================================== -->
    
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
      <h3 class="section-title">Special Deals</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
          @foreach($hot_products as $deal)
            <div class="item">
              <div class="products special-product">
                <div class="product">
                  <div class="product-micro">
                    <div class="row product-micro-row">
                      <div class="col col-xs-5">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url(str_slug($deal->product_title,'-').'/addToCart/'.$deal->id) }}"> <img src="{{ asset('storage/uploads/products/'. $deal->photo) }}"  alt="{{ $deal->product_title}}"> </a> </div> 
                          <!-- /.image --> 
                          
                        </div>
                        <!-- /.product-image --> 
                      </div>
                      <!-- /.col -->
                      <div class="col col-xs-7">
                        <div class="product-info">
                          <h3 class="name"><a href="{{ url(str_slug($deal->product_title,'-').'/addToCart/'.$deal->id) }}">{{ $deal->product_title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="product-price"> <span class="price"> INR {{ $deal->product_title}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                      </div>
                      <!-- /.col --> 
                    </div>
                    <!-- /.product-micro-row --> 
                  </div>
                  <!-- /.product-micro --> 
                  
                </div>
                
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
      <!-- /.sidebar-widget-body --> 
    </div>
    <!-- /.sidebar-widget --> 
    <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
    <!-- ============================================== NEWSLETTER ============================================== -->
    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
      <h3 class="section-title">NewsletteRS</h3>
      <div class="sidebar-widget-body outer-top-xs">
        <p>Sign Up for Our Newsletter!</p>
        <form>
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
          </div>
          <button class="btn btn-primary">Subscribe</button>
        </form>
      </div>
      <!-- /.sidebar-widget-body --> 
    </div>
    <!-- /.sidebar-widget --> 
    <!-- ======  NEWSLETTER: END =========== --> 
    
    <!-- ============================================== Testimonials============================================== -->
     
    
    <!-- ============================================== Testimonials: END ============================================== -->
     
  </div>
  <!-- /.sidemenu-holder --> 
  <!-- SIDEBAR : END  --> 

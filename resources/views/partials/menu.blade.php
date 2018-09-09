
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown" style="background-color: #2774f0; font-size: inherit; font-weight:bold; line-height: 35px">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li style="color: #fff; ">Customer Care:   {{ isset($contact_number->field_value)?$contact_number->field_value:"+91-8210829761" }}</li>  
            <li><a href="{{ url('myaccount') }}">My Account</a></li>  
            <li><a href="{{ url('checkout') }}">My Cart</a></li>
            <li>
                @if($userData==null)
                  <a href="{{url('myaccount/login')}}">Login</a>
                  @else
                  <a href="{{url('signout')}}">Logout</a>
                  @endif
               </li>
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        
        <!-- /.cnt-cart -->
        <div class="offer-text" style="
    font-family: monospace;
    font-size: 25px;
">Novika</div>


            <div class="col-md-6" style="margin-left: 40px"> 
            <form >
               <input style="margin-top: 6px;" class="search-field form-control" name="q" value="{{ $q or ''}}" placeholder="Search here..." />
               <button style="position:absolute;right: 19px;top: 13px;height: 25px;background: #fff;border: 0px solid;" class="vh79eN" type="submit">
                <svg    width="20" height="20" viewBox="0 0 17 18" class="" xmlns="http://www.w3.org/2000/svg"><g fill="#2874F1" fill-rule="evenodd"><path class="_2BhAHa" d="m11.618 9.897l4.225 4.212c.092.092.101.232.02.313l-1.465 1.46c-.081.081-.221.072-.314-.02l-4.216-4.203"></path><path class="_2BhAHa" d="m6.486 10.901c-2.42 0-4.381-1.956-4.381-4.368 0-2.413 1.961-4.369 4.381-4.369 2.42 0 4.381 1.956 4.381 4.369 0 2.413-1.961 4.368-4.381 4.368m0-10.835c-3.582 0-6.486 2.895-6.486 6.467 0 3.572 2.904 6.467 6.486 6.467 3.582 0 6.486-2.895 6.486-6.467 0-3.572-2.904-6.467-6.486-6.467"></path></g></svg></button>
            </form>
          
        </div>


        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-2 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
           
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA 
          {{ $category or 'Categories' }}
          ============================================================= -->
          <div class="search-area"> 
            <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw">
                 <a href="http://shopersquare.com">Home</a> </li>
                
                                <li class="dropdown yamm mega-menu"> 
                <a href="http://shopersquare.com/product-category/shoes/49" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Shoes</a>
                  <ul class="dropdown-menu container">
                   <li>
                      <div class="yamm-content ">
                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Shoes</h2>
                            <ul class="links">
                                                                                              <li><a href="http://shopersquare.com/product-category/Shoes/women-foot-wear/51">Women Foot Wear</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Shoes/men-foot-wear/62">Men Foot Wear</a></li> 
                                                                                            </ul>
                          </div> 
                          
                        </div>
                      </div>
                    </li> 
                  </ul> 
                </li>
                                 <li class="dropdown yamm mega-menu"> 
                <a href="http://shopersquare.com/product-category/watchs/50" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Watchs</a>
                  <ul class="dropdown-menu container">
                   <li>
                      <div class="yamm-content ">
                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Watchs</h2>
                            <ul class="links">
                                                                                              <li><a href="http://shopersquare.com/product-category/Watchs/men-watches/52">Men Watches</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Watchs/women-watches/63">Women Watches</a></li> 
                                                                                            </ul>
                          </div> 
                          
                        </div>
                      </div>
                    </li> 
                  </ul> 
                </li>
                                 <li class="dropdown yamm mega-menu"> 
                <a href="http://shopersquare.com/product-category/electronics/56" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronics</a>
                  <ul class="dropdown-menu container">
                   <li>
                      <div class="yamm-content ">
                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Electronics</h2>
                            <ul class="links">
                                                                                              <li><a href="http://shopersquare.com/product-category/Electronics/laptop/53">Laptop</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/television/64">Television</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/mobiles/70">MOBILES</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/refridgerator/90">Refridgerator</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/washing-machine/91">Washing Machine</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/microwave/92">Microwave</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/air-cinditioner/93">Air Cinditioner</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/cooler/95">Cooler</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/speaker-boofer/98">Speaker &amp; Boofer</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Electronics/fan/126">Fan</a></li> 
                                                                                            </ul>
                          </div> 
                          
                        </div>
                      </div>
                    </li> 
                  </ul> 
                </li>
                                 <li class="dropdown yamm mega-menu"> 
                <a href="http://shopersquare.com/product-category/herbal/61" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Herbal</a>
                  <ul class="dropdown-menu container">
                   <li>
                      <div class="yamm-content ">
                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Herbal</h2>
                            <ul class="links">
                                                                                              <li><a href="http://shopersquare.com/product-category/Herbal/medicinal-products/71">Medicinal Products</a></li> 
                                                                                            </ul>
                          </div> 
                          
                        </div>
                      </div>
                    </li> 
                  </ul> 
                </li>
                                 <li class="dropdown yamm mega-menu"> 
                <a href="http://shopersquare.com/product-category/accessories/84" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Accessories</a>
                  <ul class="dropdown-menu container">
                   <li>
                      <div class="yamm-content ">
                        <div class="row">
                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            <h2 class="title">Accessories</h2>
                            <ul class="links">
                                                                                              <li><a href="http://shopersquare.com/product-category/Accessories/mobile-charger/85">Mobile Charger</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Accessories/headphones/86">Headphones</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Accessories/pen-drive/87">Pen Drive</a></li> 
                                                                  <li><a href="http://shopersquare.com/product-category/Accessories/mobile-cover/88">Mobile Cover</a></li> 
                                                                                            </ul>
                          </div> 
                          
                        </div>
                      </div>
                    </li> 
                  </ul> 
                </li>       
                                
                  
               </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        

        <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="##" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner" style="background: #f16828">
              <div class="top-cart" style="background: #f16828; margin-left: 3px; ::before:#f16828">  </div>
              
              <div class="total-price-basket"> <span class="lbl">{{$total_item}} items /</span> <span class="total-price"> <span class="sign">RS</span><span class="value">{{$sub_total}}</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summ#fdd922ary">
                  
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total  :</span><span class='price'>RS{{$sub_total}}</span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ url('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- SHOPPING CART DROPDOWN : END --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>

<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container"> 
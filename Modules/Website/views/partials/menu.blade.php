
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown" style="background-color: #2774f0; font-size: inherit; font-weight:bold; line-height: 45px">
    <div class="container">
      <div class="header-top-inner">
       
        
     <div class="logo" style="float: left;">
        <a href="{{url('/')}}">  <img src="{{url('storage/uploads/img/'.$setting->website_logo)}}" style="width: 100px; height: 55px;"> </a>

        </div>


          <div class="col-md-6" style="margin-left: 10px; margin-top: 10px; color: #fff; font-size: 22px; font-family: 'Open Sans', sans-serif;"> 
               {{$setting->website_title??''}} 
          
        </div>

        <div class="col-md-5" style="width: auto;"> 
        <div class="cnt-account">
          <ul class="list-unstyled"> 
            <li style="color: #fff; ">Call Us: {{$setting->phone??$setting->mobile}} </li>  
            
                @if($userData==null)
                <li><a href="{{ url('/') }}">Home</a></li>
                 <li><a href="{{ url('signup') }}">Signup</a></li>
                <li>  <a href="{{url('myaccount/login')}}">Login</a> </li>
                <li>  <a href="{{url('contact')}}">Contact Us</a> </li>
                  @else
                  <li><a href="{{ url('myaccount') }}">My Account</a></li>  
                 <li> <a href="{{url('signout')}}">Logout</a> </li>
                  @endif
              
          </ul>
        </div>
        <!-- /.cnt-account -->
        </div>
 
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header" style="box-shadow: 0 2px 4px 0 rgba(0,0,0,.08)">
    <div class="container">
      <div class="row">
         
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-9 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA 
          {{ $category or 'Categories' }}
          ============================================================= -->
          <div class="search-area"> 
            <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer" style="font-weight: bold; font-size: 16px">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw">
                 <a href="{{url('/')}}">Home</a> </li>



                 @foreach($category_list as $key => $result)
                  
                  <?php ++$key ;
                  if($key>=6){
                    continue;
                  }
                  ?>

                <li class="dropdown yamm mega-menu"> 
                <a href="{!! url($result->slug) !!}"> {!! ucfirst(strtolower($result->category_name)) !!}</a>
                 <!--  <ul class="dropdown-menu container">
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
                  </ul>  -->
                </li> 
                                 
                      @endforeach            
                  
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
            <div class="items-cart-inner" style="background: #ff7878">
              <div class="top-cart" style="background: #ff7878; margin-left: 3px; ::before:#ff7878">  </div>
              
              <div class="total-price-basket"> <span class="lbl">{{$total_item}} items /</span> <span class="total-price"> <span class="sign">INR </span><span class="value">{{$sub_total}}</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="cart-item product-summ#fdd922ary">
                  
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text"> Total Item  :</span><span class='price'>{{$total_item}}</span> </div>
                    <hr>
                   <div class="pull-right"> <span class="text"> Total Price :</span><span class='price'>INR {{$sub_total}}</span> </div>
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
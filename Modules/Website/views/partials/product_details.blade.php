<style>
.main-product .list-inline>li{width: 10%;    display: inline-block;}
.main-product .well{width: 50%;}
.imges li {

	margin: 5px;
	border: 1px solid #ccc;
}

.imges li img{
	height: 70px;
}
.tab-pane img {
	max-height:350px !important;
	max-width: 300px;
}
.tab-content {
     padding-left: 0px; 
}
</style>



<div class="col-md-9">
    <div class="detail-block">

        <div style="visibility: visible; animation-name: fadeInUp;" class="row  wow fadeInUp animated">
                
            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                <div class="product-item-holder size-big single-product-gallery small-gallery">

                    <div class="owl-carousel owl-theme" style="opacity: 1; display: block;" id="owl-single-product">

                        <div class="owl-wrapper-outer">
                            <div style="width: 5742px; left: 0px; display: block;" class="owl-wrapper">
                                


                                 <div class="main-product">
								<!-- Tab panes -->
								<div class="tab-content ">
								  <div class="tab-pane active" id="tab-1">

								  	<img  src="{{ asset('storage/uploads/products/'. $product->photo) }}" alt="" class="img-responsive img-ht">

								  </div>
								  <div class="tab-pane" id="tab-2">
								  	<img  src="{{ asset('storage/uploads/products/'. $product->photo1) }}" alt="" class="img-responsive img-ht">
								  </div>

								  <div class="tab-pane" id="tab-3">
								  	<img  src="{{ asset('storage/uploads/products/'. $product->photo2) }}" alt="" class="img-responsive img-ht" width="100%">
								  </div>
								  
								</div>
								<!-- Nav pills -->
								<ul class="list-inline imges" style="margin-top: 20px;">
								  <li class="active" ><a href="#tab-1" data-toggle="tab">
								  	<img class="img-responsive" alt="" src="{{ asset('storage/uploads/products/'. $product->photo) }}"  ></a></li>

								  	@if(!empty($product->photo1) && file_exists(storage_path('/uploads/products/'. $product->photo1)))
								  <li><a href="#tab-2" data-toggle="tab">
								  	<img class="img-responsive" alt="" src="{{ url('storage/uploads/products/'. $product->photo1) }}"  >
								  </a></li>
								  @endif
								  @if( !empty($product->photo2) && file_exists(storage_path('/uploads/products/'. $product->photo2)))
								  <li><a href="#tab-3" data-toggle="tab">
								  	<img class="img-responsive" alt="" src="{{ asset('storage/uploads/products/'. $product->photo2) }}">
								  </a></li>
								  @endif
								</ul>
						    </div>


                            </div>
                        </div> 
 
                    </div><!-- /.single-product-slider --> 

                </div><!-- /.single-product-gallery -->
            </div>
<!-- /.gallery-holder -->        			
		<div class="col-sm-6 col-md-7 product-info-block">
			
			<div class="product-info">
				<h1 class="name">{{$product->product_title}}</h1>
			 

				<div class="stock-container info-container m-t-10">
					<div class="row">
						<div class="col-sm-2">
							<div class="stock-box">
								<span class="label">Availability :</span>
							</div>	
						</div>
						<div class="col-sm-9">
							<div class="stock-box">
								<span class="value">In Stock</span>
							</div>	
						</div>
					</div><!-- /.row -->	
				</div><!-- /.stock-container -->

				<div class="description-container m-t-20">
					 {!! str_limit($product->description,100) !!}
				</div><!-- /.description-container -->

				<div class="price-container info-container m-t-20">
					<div class="row">
						

						<div class="col-sm-6">
							<div class="price-box">
								<span class="price">RS{{$product->price-($product->price*$product->discount/100)}}</span>
								<span class="price-strike">RS{{$product->price}}</span>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="favorite-button m-t-10">
								<a data-original-title="Wishlist" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" href="#">
								    <i class="fa fa-heart"></i>
								</a>
								 
								<a data-original-title="E-mail" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="" href="index.htm#">
								    <i class="fa fa-envelope"></i>
								</a>
							</div>
						</div>

					</div><!-- /.row -->
				</div><!-- /.price-container -->

				<div class="quantity-container info-container">
					<div class="row">
						
						<div class="col-sm-2">
							<span class="label">Qty :</span>
						</div>
						
						<div class="col-sm-2">
							<div class="cart-quantity">
								<div class="quant-input">
					                
					                <input value="1" type="number" min="1" onchange="updateCart(this.value)">
				              </div> 
				            </div>
						</div>

						<div class="col-sm-2" style="margin-right: 70px;">
							<a href="{{ url(str_slug($product->product_title,'-').'/addToCart/'.$product->id) }}" id="addToCart" class="btn btn-primary">
                            <i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
						</div>
                        | 
                        <div class="col-sm-2">
                            <a href="{{ url(str_slug($product->product_title,'-').'/buyNow/'.$product->id) }}" class="btn btn-success">
                            <i class="fa fa-shopping-cart inner-right-vs"></i> BUY </a>
                        </div>


						
					</div><!-- /.row -->
				</div><!-- /.quantity-container --> 
				
			</div><!-- /.product-info -->
		</div><!-- /.col-sm-7 -->
		</div><!-- /.row -->
     </div>  

	<div class="product-tabs inner-bottom-xs  wow fadeInUp">
	<div class="row">
	<div class="col-sm-3">
	<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
	<li class="active">
	<a data-toggle="tab" href="index.htm#description">DESCRIPTION</a>
	</li>
	<!--  <li>
	<a data-toggle="tab" href="index.htm#tags">TAGS</a>
	</li> -->
	</ul><!-- /.nav-tabs #product-tabs -->
	</div>
	<div class="col-sm-9"> 
	<div class="tab-content">

	<div id="description" class="tab-pane in active">
	<div class="product-tab">
	<p class="text">

	{!! $product->description !!}

	</p>
	</div>      
	</div><!-- /.tab-pane -->



	</div><!-- /.tab-content -->
	</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.product-tabs -->
  
</div>

<script type="text/javascript">
	
	function updateCart(value) {
		  
		  var href = $('#addToCart').attr('href');

		  $('#addToCart').attr('href',href+'?item='+value); 
	}
</script>
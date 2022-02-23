@extends("welcome")

@section("content")

<h2 class="title text-center">Features Items</h2>
                        <div class="owl-carousel owl-theme">
					        @foreach($product as $product)
							<div class="item">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 200px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>{{$product->manufacture_name}}</a></li>
											<li><a href="{{url('/view-product/' .$product->product_id)}}"><i class="fa fa-plus-square"></i>View product</a></li>
										</ul>
									</div>
								</div>
							</div>

							@endforeach

                       </div>
							
						</div><!--features_items-->


					

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Women</a></li>
          <li role="presentation"><a href="#men" aria-controls="profile" role="tab" data-toggle="tab">Men</a></li>
		  <li role="presentation"><a href="#kids" aria-controls="profile" role="tab" data-toggle="tab">Kids</a></li>
		  <li role="presentation"><a href="#sport" aria-controls="profile" role="tab" data-toggle="tab">Sport</a></li>
		  <li role="presentation"><a href="#electronics" aria-controls="profile" role="tab" data-toggle="tab">Electronics</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
                <div id="owl-example" class="owl-carousel">
				@foreach($womens as $product)
							<div class="item ">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 150px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach
                  
                </div>    
          </div>
          <div role="tabpanel" class="tab-pane" id="men">
            <div id="owl-example" class="owl-carousel">
			@foreach($men as $product)
							<div class="item">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 150px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach
                </div> 
          </div>
       
		  <div role="tabpanel" class="tab-pane" id="kids">
            <div id="owl-example" class="owl-carousel">
			@foreach($kids as $product)
							<div class="item">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 150px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach
                </div> 
          </div>
       
 
		  <div role="tabpanel" class="tab-pane" id="sport">
            <div id="owl-example" class="owl-carousel">
			@foreach($sports as $product)
							<div class="item">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 150px;" alt="" />
											<h2>Tsh{{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach
                </div> 
          </div>
       
		
		  <div role="tabpanel" class="tab-pane" id="electronics">
            <div id="owl-example" class="owl-carousel">
			@foreach($electronics as $product)
							<div class="item">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to($product->product_image)}}" style="height: 150px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach
                </div> 
          </div>
       
		  <!------>

    </div>
  

						
						<div class="recommended_items"><!--recommended_items-->
							<h2 class="title text-center">recommended items</h2>

							

				<div class="owl-carousel owl-theme">
			
				@foreach($recomend as $product)
										<div class="item">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="{{URL::to($product->product_image)}}" style="height: 200px;" alt="" />
											<h2>Tsh {{$product->product_price}}</h2>
											<p>{{$product->product_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Tsh {{$product->product_price}}</h2>
												<p>{{$product->product_name}}</p>
												<a href="{{url('/view-product/' .$product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
									</div>
									
								</div>
							</div>

							@endforeach

       </div>

</div>
									
					

@endsection

@section('script')


<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
 <script>
	 $(document).ready(function(){

		$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
	dots:true,
	autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        e.target // newly activated tab
        e.relatedTarget // previous active tab
        $(".owl-carousel").trigger('refresh.owl.carousel');
      });

	 });

 </script>
@endsection
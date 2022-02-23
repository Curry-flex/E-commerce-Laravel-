@extends("welcom2")

@section('content')

<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{url($viewProduct->product_image)}}" height="200px" alt="" />
								<h3>{{$viewProduct->product_name}}</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$viewProduct->product_name}}</h2>
								<p>{{$viewProduct->product_color}}</p>
								<img src="{{URL::to('frontend/images/product-details/rating.png')}}" height="" alt="" />
								<span>
									<span>Tsh {{$viewProduct->product_price}}</span>
                                    <form action="{{url('/add-cart')}}" method="post">
                                        @csrf
									<label>Quantity:</label>
									<input type="text" name="qty" value="1" />
                                    <input type="hidden" name="product_id" value={{$viewProduct->product_id}}>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
                                    </form> 
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b>{{$viewProduct->manufacture_name}}</p>
                                <p><b>Size:</b>{{$viewProduct->product_size}}</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
							
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<h5>{{$viewProduct->product_description}}</h5>
											</div>
										</div>
									</div>
								</div>
							
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
							
							
							 <P>ALLY MTATI company is created on 2022 to provide online sells of different products around the world your request our service</P>
							</div>
							
					
							
						</div>
					</div><!--/category-tab-->


@endsection
@extends("welcom2")


@section("content")

<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Action</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($content->options->image)}}" width="80px" height="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-quantity')}}" method="post">
										@csrf
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$content->rowId}}">
									<input type="submit" value="update" class="btn btn-sm-btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Tsh {{$content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'. $content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                         @endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>Tsh {{Cart::subtotal()}}</span></li>
							<li>Tax <span>Tsh {{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>Tsh {{Cart::total()}}</span></li>
						</ul>
							
                             <h3 class="text-center">SELECT PAYMENT METHOD</h3>
                             
                            <ul>
                               <form action="{{url('/place-order')}}" method="post">
                                   @csrf
                                   <input name="payment" type="radio" value="M-pesa"> M-pesa<br>
                                   <input name="payment" type="radio" value="tigo pesa"> Tigo pesa<br>
                                   <input  name="payment" type="radio" value="halo pesa"> Halo pesa<br>
                                   <input name="payment"  type="radio" value="CRDB"> CRDB<br>
                                   <input name="payment" type="radio" value="NMB"> NMB<br>
                                   <input  type="submit" value="Done" class="btn btn-primary m-5"> 

                               </form>
                            </ul>
                        
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection
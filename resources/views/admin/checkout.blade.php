@extends('welcom2')

@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

	

			<div class="register-req">
				<p>Checkout </p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
				
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('add-shipping')}}" method="post">
                                    @csrf
									<input type="text" placeholder="First name" name="fname" required>
									<input type="text" placeholder="Last name" name="lname" required>
									<input type="email" placeholder="email" name="email" required>
									<input type="text" placeholder="Address" name="address" required>
									<input type="number" placeholder="mobile" name="mobile" required>
                                    <input type="text" placeholder="country" name="country" required>
									<input type="text" placeholder="city" name="city" required>
                                    <input type="submit" value="submit" class="btn btn-primary">
									
								</form>
							</div>
						
						</div>
					</div>
										
				</div>
			</div>
			<div class="review-payment">
				
			</div>

			<div class="payment-options">
				
				</div>
		</div>
	</section> <!--/#cart_items-->

	


@endsection
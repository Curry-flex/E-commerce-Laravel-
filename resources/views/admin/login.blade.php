@extends('welcom2')

@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/customer-login')}}" method="POST">
                            @csrf
							<input type="email" placeholder="email" name="email" required/>
                            
							<input type="password" placeholder="password" name="password" required />
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/customer-register')}}" method="POST">
                            @csrf
							<input type="text" placeholder="Full name" name="name" required/>
							<input type="email" placeholder="Email Address" name="email" required />
							<input type="password" placeholder="Password" name="password" required/>
                            <input type="number" placeholder="mobile"  name="mobile" required/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection

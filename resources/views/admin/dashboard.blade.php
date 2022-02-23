@extends('admin.admin_layout')


@section('content')



<ul class="breadcrumb">
			
			
			<div class="row-fluid">	
                 <div class="col-md-12">

				 
				<a class="quick-button metro yellow span2" href="#">
					<i class="icon-cloud"></i>
					<p>Products</p>
					<span class="badge">{{$product}}</span>
				</a>
				<a class="quick-button metro red span2">
					<i class="icon-group"></i>
					<p>Customers</p>
					<span class="badge">{{$customers}}</span>
				</a>
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge">{{$order}}</span>
				</a>
				<a class="quick-button metro green span2">
					<i class="icon-cogs"></i>
					<p>Manufacture</p>
					<span class="badge">{{$manufacture}}</span>
				</a>
				<a class="quick-button metro pink span2">
					<i class="icon-certificate"></i>
					<p>Categories</p>
					<span class="badge">{{$category}}</span>
				</a>

				<a class="quick-button metro pink span2">
					<i class="icon-truck"></i>
					<p>Shippings</p>
					<span class="badge">{{$shipping}}</span>
				</a>
				
				
				<div class="clearfix"></div>

				</div>
								
			</div><!--/row-->

@endsection
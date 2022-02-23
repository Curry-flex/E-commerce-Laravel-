@extends('admin.admin_layout')


@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>


			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-responsive table-condensed">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Mobile</th>
									                                           
								  </tr>
							  </thead>   
							  <tbody>
								
								<tr>
                                @foreach($odaaa as $od)
                                @endforeach
							      <td>{{$od->customer_name}}</td>  
                                  <td>{{$od->customer_mobile}}</td>                               
								</tr>                                   
							  </tbody>
						 </table>  
						     
					</div>
				</div><!--/span-->
				
				<div class="box span8">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-responsive table-condensed">
							  <thead>
								  <tr>
									  <th>First name</th>
									  <th>Last name</th>
                                      <th>Address</th>
									  <th>Mobile</th>
                                      <th>Country</th>
                                      <th>City</th>
									                                         
								  </tr>
							  </thead>   
							  <tbody>
								
								<tr>
                                @foreach($odaaa as $od)
                                @endforeach   
                                <td>{{$od->shipping_first_name}}</td>  
                                <td>{{$od->shipping_last_name}}</td>   
                                <td>{{$od->shipping_address}}</td> 
                                <td>{{$od->shipping_mobile}}</td> 
                                <td>{{$od->shipping_country}}</td> 
                                <td>{{$od->shipping_city}}</td>                                      
								</tr>                                   
							  </tbody>
						 </table>  
						    
					</div>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-responsive table-condensed">
							  <thead>
								  <tr>
									  <th>Order ID</th>
									  <th>Product name</th>
									  <th>Product price</th>
									  <th>Product quantity</th> 
                                      <th>Total</th>                                         
								  </tr>
							  </thead>   
							  <tbody>
								
								<tr>
                                @foreach($odaaa as $od)
                                <td>{{$od->order_id}}</td> 	
                                <td>{{$od->product_name}}</td> 
                                <td>{{$od->product_price}}</td> 
                                <td>{{$od->product_quantity}}</td>
                                <td>{{$od->product_price * $od->product_quantity}}</td>                                         
								</tr>
                                
                                @endforeach
							  </tbody>

                              <tfoot>
                                  <tr>
                                      <td colspan="4">Total</td>
                                      <td><strong>{{$od->order_total}}</strong></td>
                                  </tr>
                              </tfoot>
						 </table>  
						 
					</div>
				</div><!--/span-->
				
				
			
			</div><!--/row-->
			
	
			</div><!--/row-->
    

	</div><!--/.fluid-container-->

@endsection

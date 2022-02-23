@extends('admin.admin_layout')



@section('content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive table-condensed">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Customer name</th>
								  <th>Total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

						  @foreach($oda as $order)
						  <tr>
								<td>{{$order->order_id}}</td>
								<td class="center">{{$order->customer_name}}</td>
								<td class="center">{{$order->order_total}}</td>
								<td class="center">
									@if($order->order_status=="pending")
									<span class="label label-danger">Pending</span>

									@elseif($order->order_status=="done")
									<span class="label label-success">Done</span>

									@endif

								</td>
								<td class="center">


									<a class="btn btn-info" href="{{url('/view-order/'.$order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{url('delete-order/' .$order->order_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>


						  @endforeach
						
						
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			

@endsection

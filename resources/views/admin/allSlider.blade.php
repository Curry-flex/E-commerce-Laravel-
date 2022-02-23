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
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Slider</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<div class="m-5" style="margin:10px;">
					  <a href="{{url('/addSlider')}}" class="btn btn-primary p-5"> Add slider</span></a>
					  </div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive table-condensed">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

						  @foreach($allSlider as $slider)
						  <tr>
								<td>{{$slider->slider_id}}</td>
								<td class="center"><img src="{{URL::to($slider->slider_image)}}" height="80px" width="80px" alt=""></td>
								
								<td class="center">
									@if($slider->slider_status=="on")
									<span class="label label-success">Active</span>

									@elseif($slider->slider_status=="NULL")
									<span class="label label-danger">inactive</span>

									@endif

								</td>
								<td class="center">
									@if($slider->slider_status =="on")
									<a class="btn btn-success" href="{{url('/unactiveS/' .$slider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

									@else
									<a class="btn btn-danger" href="{{url('/activeS/' .$slider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>

									@endif

									
									<a class="btn btn-danger" id="delete" href="{{url('delete-slider/' .$slider->slider_id)}}">
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

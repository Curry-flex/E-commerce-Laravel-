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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Contact</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<div class="m-5" style="margin:10px;">
					  <a href="{{url('/addContact')}}" class="btn btn-primary p-5"> Add contacts</span></a>
					  </div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-responsive table-condensed">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Phone</th>
								  <th>Email</th>
								  
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>

						  @foreach($contact as $contact)
						  <tr>
								<td>{{$contact->contact_id}}</td>
								<td class="center">{{$contact->phone}}</td>
								<td class="center">{{$contact->email}}</td>
								
								<td class="center">
									

									<a class="btn btn-info" href="{{url('/contact-view/' . $contact->contact_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{url('/deletecontact/' .$contact->contact_id)}}">
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

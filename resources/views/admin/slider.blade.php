@extends('admin.admin_layout')

@section('content')


 	
<ul class="breadcrumb">
			
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
						
					</div>
					<div class="box-content">
						<p class="alert alert-success">
                          <?php
                           $message=Session::get("message");
						   echo $message;
						   Session::put("message", null);
						  ?>
						</p>
						<form class="form-horizontal" action="{{url('/add-slider')}}" method="post" enctype="multipart/form-data">
							@Csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Image </label>
							  <div class="controls">
								<input type="file" class="span6 typeahead" required  name="slider_image"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>
							


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Status</label>
							  <div class="controls">
								<input type="checkbox" name="slider_status">
							  </div>
							</div>



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Slider</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
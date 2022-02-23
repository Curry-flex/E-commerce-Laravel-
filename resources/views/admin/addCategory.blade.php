@extends('admin.admin_layout')

@section('content')


 	
<ul class="breadcrumb">
			
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
						
						
					</div>

                      
					
					<div class="box-content">
						<p class="alert alert-success">
                          <?php
                           $message=Session::get("message");
						   echo $message;
						   Session::put("message", null);
						  ?>
						</p>
						<form class="form-horizontal" action="{{url('/add-category')}}" method="post">
							@Csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Category name </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" required  name="category_name"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>
							

	         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="category_description" rows="3" required></textarea >
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Status</label>
							  <div class="controls">
								<input type="checkbox" name="category_status">
							  </div>
							</div>



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
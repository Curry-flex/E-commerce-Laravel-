@extends('admin.admin_layout')

@section('content')


 	
<ul class="breadcrumb">
			
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						
					</div>
					<div class="box-content">
						<p class="alert alert-success">
                          <?php
                           $message=Session::get("message");
						   echo $message;
						   Session::put("message", null);
						  ?>
						</p>
						<form class="form-horizontal" action="{{url('/add-product')}}" method="post" enctype="multipart/form-data">
							@Csrf
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" required  name="product_name"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>
							
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Category</label>
							  <div class="controls">
								
                              <select name="category_id" id="" class="form-control">
                                  <option value="">select</option>
                                  @foreach($category as $category)
                                  <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                  @endforeach
                              </select>
							
							  </div>
							</div>


                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product Manufacture</label>
							  <div class="controls">
                              <select name="manufacture_id" id="" class="form-control">
                                <option value="">select</option>
                                  @foreach($manufacture as $manufacture)
                                  <option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
                                  @endforeach
                              </select>
							
							  </div>
							</div>
	         
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_description" rows="3" required></textarea >
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product price</label>
							  <div class="controls">
								<input type="number" class="span6 typeahead" required  name="product_price"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product color</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" required  name="product_color"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product image</label>
							  <div class="controls">
								<input type="file" class="input-file uniform-on" required  name="product_image">
							
							  </div>
							</div>

                            <div class="control-group">
							  <label class="control-label" for="typeahead">Product size</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead"  name="product_size"   data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
							
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Status</label>
							  <div class="controls">
								<input type="checkbox" name="product_status">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Recomended</label>
							  <div class="controls">
								<input type="checkbox" name="recomend">
							  </div>
							</div>



							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
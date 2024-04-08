@include('Admin/homeheader')


<div class="container">
	<div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 ">
                	<div class="row">
                		<div class="col-md-6">
		                    <h6 class="m-0 font-weight-bold text-primary"> <?= $active?>
		                    </h6>
		                	<p class="m-0"><a href="{{ url('Admin/')}}">Dashboard</a> / <?= $active?></p>
                		</div>
                	</div>
                </div>
				
				@if(!empty($errors->first()))				
					<div class="alert alert-danger">
						{{ $errors->first() }}
					</div>
				@endif
                <!-- Card Body -->
                <div class="card-body">
                    <form  method="post" action="{{ url('Admin/add-entity')}}" >
                        @csrf
                    	<div class="row">

                		 	<div class="col-md-12">            		 	
		                        <label>Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
		                            </div>
		                        </div>
            		 		</div>
                            
                		 	<div class="col-md-12">            		 	
		                        <label>Communication Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="communication_address" class="form-control" placeholder="Enter Communication Address" required>
		                            </div>
		                        </div>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>PAN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="pan" class="form-control" placeholder="Enter PAN" required>
		                            </div>
		                        </div>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>GSTIN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="gstin" class="form-control" placeholder="Enter GSTIN" required>
		                            </div>
		                        </div>
                		 	</div>
                            
                            <div class="col-md-12">            		 	
		                        <label>State</label>
                    	        <select name="state" required class="form-control">
                    	            <option value="">Select State</option>
									<?php $state = DB::table('states')->get(); ?>
									@foreach($state as $states)
									<option value="{{ $states->state_code }}" >{{ $states->state }}</option>
									@endforeach
                    	        </select>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>LUT</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="lut" class="form-control" placeholder="Enter LUT">
		                            </div>
		                        </div>
                		 	</div>
                		 	



                		 	
                		 	<div class="col-md-12">            		 	
		                        <label>Bank Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Bank Account Number</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="acc_no" class="form-control" placeholder="Enter Account Number" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Bank IFSC</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="ifsc" class="form-control" placeholder="Enter IFSC" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Bank Branch</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="branch" class="form-control" placeholder="Enter Branch Name" required>
		                            </div>
		                        </div>
                		 	</div>


                    	</div>
                        <a href="{{ url('Admin/users-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Admin/homefooter')
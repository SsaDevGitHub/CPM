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
                <!-- Card Body -->
				
				@if(!empty($errors->first()))				
					<div class="alert alert-danger">
						{{ $errors->first() }}
					</div>
				@endif

                <div class="card-body">
                    <form  method="post" action="{{ url('Admin/add-client')}}" >
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
		                        <label>Group</label>
                    	        <select name="group"  class="form-control">
                    	            <option value="" >Select User Group</option>
                    	            <?php $group = DB::table('groups')->get(); ?>
									@foreach($group as $groups)
									<option value="{{ $groups->group }}">{{ $groups->group }}</option>
									@endforeach
                    	        </select>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Kind Attention</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="kind_att" class="form-control" placeholder="Enter Kind Attention" >
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
		                        <label>TAN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="tan_no" class="form-control" placeholder="Enter TAN" >
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Active status</label>
                    	        <select name="active_status"  class="form-control">
                    	            <option value="" >Select User Status</option>
                    	            <option value="0" >Active</option>
                    	            <option value="1" >In-Active</option>
                    	        </select>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Email</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
		                            </div>
		                        </div>
                		 	</div>
                		 	
                		 	<div class="col-md-12">            		 	
		                        <label>Mobile No.</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Associated From</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="associated_from" class="form-control" placeholder="Enter Associated From" >
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Status</label>		                        
                    	        <select name="status"  class="form-control">
                    	            <option value="" >Select User Status</option>
									<option value="Individual">Individual</option>
									<option value="Proprietor Firm">Proprietor Firm</option>
									<option value="HUF">HUF</option>
									<option value="AOP">AOP</option>
									<option value="BOI">BOI</option>
									<option value="Society">Society</option>
									<option value="Trust">Trust</option>
									<option value="Pvt Company">Pvt Company</option>
									<option value="Public Company">Public Company</option>
									<option value="Partnership Firm">Partnership Firm</option>
									<option value="LLP">LLP</option>
									<option value="Foreign Company">Foreign Company</option>
									<option value="Foreign Entity">Foreign Entity</option>
									<option value="Others">Others</option>
                    	        </select>
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
                    	            <option value="" >Select State</option>
                    	            <?php $state = DB::table('states')->get(); ?>
									@foreach($state as $states)
									<option value="{{ $states->state_code }}">{{ $states->state }}</option>
									@endforeach
                    	        </select>
                		 	</div>
                            
                            <div class="col-md-12">            		 	
		                        <label>DOB</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="dob" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

                    	</div>

                        <a href="{{ url('Admin/client-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Admin/homefooter')
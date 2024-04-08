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
                    <form  method="post" action="{{ url('Admin/edit-client')}}/{{ $tabledata->id }}" >
                        @csrf
                    	<div class="row">

                		 	<div class="col-md-12">            		 	
		                        <label>Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="name" value="{{ $tabledata->name }}" class="form-control" placeholder="Enter Name" required>
		                            </div>
		                        </div>
            		 		</div>
                            
                		 	<div class="col-md-12">            		 	
		                        <label>Group</label>
                    	        <select name="group"  class="form-control">
                    	            <option value="" @if($tabledata->group == "") selected @endif  >Select User Group</option>
									<?php $group = DB::table('groups')->get(); ?>
									@foreach($group as $groups)
									<option value="{{ $groups->group }}" @if($tabledata->group == $groups->group) selected @endif >{{ $groups->group }}</option>
									@endforeach
                    	        </select>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Kind Attention</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->kind_att }}" name="kind_att" class="form-control" placeholder="Enter Kind Attention" >
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Communication Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->communication_address }}" name="communication_address" class="form-control" placeholder="Enter Communication Address" required>
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>PAN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->pan }}" name="pan" class="form-control" placeholder="Enter PAN" required>
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>TAN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->tan_no }}" name="tan_no" class="form-control" placeholder="Enter TAN" >
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Active status</label>
                    	        <select name="active_status"  class="form-control">
                    	            <option value="" @if($tabledata->active_status == "") selected @endif >Select User Status</option>
                    	            <option value="0" @if($tabledata->active_status == "0") selected @endif >Active</option>
                    	            <option value="1" @if($tabledata->active_status == "1") selected @endif >In-Active</option>
                    	        </select>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Email</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->email }}" name="email" class="form-control" placeholder="Enter Email" required>
		                            </div>
		                        </div>
                		 	</div>
                		 	
                		 	<div class="col-md-12">            		 	
		                        <label>Mobile No.</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->mobile }}" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Associated From</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->associated_from }}" name="associated_from" class="form-control" placeholder="Enter Associated From" >
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Status</label>
		                        <select name="status"  class="form-control">
                    	            <option value="" @if($tabledata->status == "") selected @endif >Select User Status</option>
									<option @if($tabledata->status == "Individual") selected @endif value="Individual">Individual</option>
									<option @if($tabledata->status == "Proprietor Firm") selected @endif value="Proprietor Firm">Proprietor Firm</option>
									<option @if($tabledata->status == "HUF") selected @endif value="HUF">HUF</option>
									<option @if($tabledata->status == "AOP") selected @endif value="AOP">AOP</option>
									<option @if($tabledata->status == "BOI") selected @endif value="BOI">BOI</option>
									<option @if($tabledata->status == "Society") selected @endif value="Society">Society</option>
									<option @if($tabledata->status == "Trust") selected @endif value="Trust">Trust</option>
									<option @if($tabledata->status == "Pvt Company") selected @endif value="Pvt Company">Pvt Company</option>
									<option @if($tabledata->status == "Public Company") selected @endif value="Public Company">Public Company</option>
									<option @if($tabledata->status == "Partnership Firm") selected @endif value="Partnership Firm">Partnership Firm</option>
									<option @if($tabledata->status == "LLP") selected @endif value="LLP">LLP</option>
									<option @if($tabledata->status == "Foreign Company") selected @endif value="Foreign Company">Foreign Company</option>
									<option @if($tabledata->status == "Foreign Entity") selected @endif value="Foreign Entity">Foreign Entity</option>
									<option @if($tabledata->status == "Others") selected @endif value="Others">Others</option>
                    	        </select>
                		 	</div>


                            
                            <div class="col-md-12">            		 	
		                        <label>GSTIN</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->gstin }}" name="gstin" class="form-control" placeholder="Enter GSTIN" required>
		                            </div>
		                        </div>
                		 	</div>
                            
                            <div class="col-md-12">            		 	
		                        <label>State</label>
                    	        <select name="state" required class="form-control">
                    	            <option value="" @if($tabledata->state == "") selected @endif >Select State</option>
									<?php $state = DB::table('states')->get(); ?>
									@foreach($state as $states)
									<option value="{{ $states->state_code }}" @if($tabledata->state == $states->state_code) selected @endif >{{ $states->state }}</option>
									@endforeach
                    	        </select>
                		 	</div>
                            
                            <div class="col-md-12">            		 	
		                        <label>DOB</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="dob" value="{{ $tabledata->dob }}" class="form-control" required>
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
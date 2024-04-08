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
                            @php $title = "Add Users"; @endphp
		                    <h6 class="m-0 font-weight-bold text-primary"> <?= $title?>
		                    </h6>
		                	<p class="m-0"><a href="{{ url('Admin/')}}">Dashboard</a> / <?= $title?></p>
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
                    <form  method="post" action="{{ url('Admin/add-users')}}" >
                        @csrf
                    	<div class="row">
                    	    <div class="col-md-12">
                    	        <label>Select User Role</label>
                    	        <select name="user_type"  class="form-control">
                    	            <option value="" required>Select User Role</option>
                    	            <option value="1" required>Normal User</option>
                    	            <option value="2" required>Team Leader</option>
                    	        </select>
                    	    </div>
                		 	<div class="col-md-12">            		 	
		                        <label>Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
		                            </div>
		                        </div>
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
		                                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required>
		                            </div>
		                        </div>
                		 	</div>
                		 	<div class="col-md-12">            		 	
		                        <label>Password</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
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
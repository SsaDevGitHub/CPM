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
                <div class="card-body">
                    <form  method="post" action="{{ url('Admin/add-timesheet')}}" >
                        @csrf
                    	<div class="row">

                            <div class="col-md-12">            		 	
		                        <label>Client</label>
                    	        <select name="client"  class="form-control">
                                    <?php $client = DB::table('client')->get(); ?>
                    	            <option value="" required>Select Client</option>
                                    @foreach($client as $clients)
                    	            <option value="{{ $clients->id }}" required>{{ $clients->name }}</option>
                                    @endforeach
                    	        </select>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Assignment</label>
                    	        <select name="assignment"  class="form-control">
                                    <?php $assignment = DB::table('assignment')->get(); ?>
                    	            <option value="" required>Select Assignment</option>
                                    @foreach($assignment as $assignments)
                    	            <option value="{{ $assignments->id }}" required>{{ $assignments->name }}</option>
                                    @endforeach
                    	        </select>
                		 	</div>

                            
                            <div class="col-md-12">            		 	
		                        <label>Hours</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="time" name="hours" class="form-control" placeholder="Enter hours" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Remark</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="remark" class="form-control" placeholder="Enter remark" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Mode</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="mode" class="form-control" placeholder="Enter mode" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="location" class="form-control" placeholder="Enter location" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Amount</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="amount" class="form-control" placeholder="Enter amount" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location GPS</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="location_gps" class="form-control" placeholder="Enter Location Gps" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="location_address" class="form-control" placeholder="Enter Location Address" required>
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
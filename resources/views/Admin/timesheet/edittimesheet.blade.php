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
                    <form  method="post" action="{{ url('Admin/edit-timesheet')}}/{{ $data->id }}" >
                        @csrf
                    	<div class="row">

                            <div class="col-md-12">            		 	
		                        <label>Employee</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="employee" value="{{ $data->employee_one->name }}" class="form-control" readonly>
		                                <input type="hidden" name="employee_id" value="{{ $data->employee_one->id }}" class="form-control" readonly>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Assignment Map Period</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="assignment_map" value="{{ $data->assignment_map->period }}" class="form-control" readonly>
		                                <input type="hidden" name="assignment_map_id" value="{{ $data->assignment_map->id }}" class="form-control" readonly>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Client</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="client" value="{{ $data->assignment_map->client->name }}" class="form-control" readonly>
		                                <input type="hidden" name="client_id" value="{{ $data->assignment_map->client->id }}" class="form-control" readonly>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12"> 		 	
		                        <label>Assignment</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="assignment" value="{{ $data->assignment_map->assignment->name }}" class="form-control" readonly>
		                                <input type="hidden" name="assignment_id" value="{{ $data->assignment_map->assignment->id }}" class="form-control" readonly>
		                            </div>
		                        </div>
                		 	</div>
                            
                            <div class="col-md-12">            		 	
		                        <label>Hours</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="number" name="hours" class="form-control" placeholder="Enter hours" value="{{ $timesheet->hours }}" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Remark</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="remarks" class="form-control" value="{{ $timesheet->remarks }}" placeholder="Enter remark" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Mode</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $timesheet->mode }}" name="mode" class="form-control" placeholder="Enter mode" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $timesheet->location }}" name="location" class="form-control" placeholder="Enter location" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Amount</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $timesheet->amount }}" name="amount" class="form-control" placeholder="Enter amount" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location GPS</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $timesheet->location_gps }}" name="location_gps" class="form-control" placeholder="Enter Location Gps" required>
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Location Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $timesheet->location_address }}" name="location_address" class="form-control" placeholder="Enter Location Address" required>
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
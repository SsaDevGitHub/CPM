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
                    <form  method="post" action="{{ url('Admin/edit-assignment')}}/{{ $tabledata->id }}" >
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
		                        <label>Practice</label>
                    	        <select name="practice" required class="form-control">
                    	            <option value="" @if($tabledata->practice == "") selected @endif >Select Practice</option>
									<option @if($tabledata->practice == "Assurance") selected @endif value="Assurance">Assurance</option>
									<option @if($tabledata->practice == "Audit") selected @endif value="Audit">Audit</option>
									<option @if($tabledata->practice == "Consulting") selected @endif value="Consulting">Consulting</option>
									<option @if($tabledata->practice == "Risk") selected @endif value="Risk advisory">Risk advisory</option>
									<option @if($tabledata->practice == "Secretarial") selected @endif value="Secretarial">Secretarial</option>
									<option @if($tabledata->practice == "Taxation") selected @endif value="Taxation">Taxation</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Status</label>
                    	        <select name="status"  class="form-control">
                    	            <option value="" required>Select Assignment Status</option>
                    	            <option value="0" @if($tabledata->status == 0) selected @endif >Active</option>
                    	            <option value="1" @if($tabledata->status == 1) selected @endif >In-Active</option>									
                    	        </select>
                		 	</div>

                    	</div>
                        <a href="{{ url('Admin/assignment-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Admin/homefooter')
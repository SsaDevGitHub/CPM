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
                    <form  method="post" action="{{ url('Admin/add-employee')}}" >
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
		                        <label>official Mail ID</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="official_email" class="form-control" placeholder="Enter Official Mail" required>
		                            </div>
		                        </div>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Entity</label>
                    	        <select name="entity" required class="form-control">
									<?php $entity = DB::table('entity')->get(); ?>
                    	            <option value="">Entity</option>
									@foreach($entity as $entities)
                    	            <option value="{{ $entities->name }}">{{ $entities->name }}</option>
									@endforeach
                    	        </select>
                		 	</div>


							 <div class="col-md-12">            		 	
		                        <label>Department</label>
                    	        <select name="department" required class="form-control">
                    	            <option value="" >Select</option>
                    	            <option value="Admin" >Admin</option>
                    	            <option value="Assurance" >Assurance</option>
                    	            <option value="Audit" >Audit</option>
                    	            <option value="Consulting" >Consulting</option>
                    	            <option value="Housekeeping" >Housekeeping</option>
                    	            <option value="Information Technology" >Information Technology</option>
                    	            <option value="Risk Advisory" >Risk Advisory</option>
                    	            <option value="Secretarial" >Secretarial</option>
                    	            <option value="Taxation" >Taxation</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">      		 	
		                        <label>Sub-Department</label>
                    	        <select name="sub_department" required class="form-control">
                    	            <option value="" >Select</option>
                    	            <option value="Admin" >Admin</option>
                    	            <option value="Assurance" >Assurance</option>
                    	            <option value="Audit" >Audit</option>
                    	            <option value="Consulting" >Consulting</option>
                    	            <option value="Consulting SLA" >Consulting SLA</option>
                    	            <option value="Housekeeping" >Housekeeping</option>
                    	            <option value="Information Technology" >Information Technology</option>
                    	            <option value="Risk Advisory" >Risk Advisory</option>
                    	            <option value="Secretarial" >Secretarial</option>
                    	            <option value="Taxation" >Taxation</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Employee PC</label>
                    	        <select name="emppc" required class="form-control">
                    	            <option value="" >Select</option>
                    	            <option value="Jasola">Jasola</option>
                    	            <option value="MB">MB</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Location</label>
                    	        <select name="location" required class="form-control">
                    	            <option value="" >Select Location</option>
                    	            <option value="Maharani Bagh">Maharani Bagh</option>
                    	            <option value="Govindpuri">Govindpuri</option>
                    	            <option value="Gurugram">Gurugram</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Designation</label>
                    	        <select name="designation" required class="form-control">
                    	            <option value="" >Select Designation</option>
                    	            <option value="Senior Partner">Senior Partner</option>
									<option value="Partner">Partner</option>
									<option value="Director">Director</option>
									<option value="Senior Manager">Senior Manager</option>
									<option value="Manager">Manager</option>
									<option value="Associate Manager">Associate Manager</option>
									<option value="Senior Executive">Senior Executive</option>
									<option value="Executive">Executive</option>
									<option value="Associate Executive">Associate Executive</option>
									<option value="Intern-I">Intern-I</option>
									<option value="Intern-II">Intern-II</option>
									<option value="Intern-Final">Intern-Final</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Moderator</label>
                    	        <select name="moderator" required class="form-control">
                    	            <option value="" >Select</option>
									<option value="MD-01_Kapil Mittal">MD-01_Kapil Mittal</option>
									<option value="MD-02_Sanjay Agarwal">MD-02_Sanjay Agarwal</option>
									<option value="MD-03_Siddharth Bansal">MD-03_Siddharth Bansal</option>
									<option value="MD-04_Pawan Kumar Jain">MD-04_Pawan Kumar Jain</option>
									<option value="MD-05_Amit Singh">MD-05_Amit Singh</option>
									<option value="MD-06_Krishan Gopal">MD-06_Krishan Gopal</option>
									<option value="MD-07_Deepak Goyal">MD-07_Deepak Goyal</option>
									<option value="MD-08_Naresh Goel">MD-08_Naresh Goel</option>
									<option value="MD-09_Sumit Shakya">MD-09_Sumit Shakya</option>
									<option value="MD-10_Pulkit Kumar">MD-10_Pulkit Kumar</option>
									<option value="MD-12_Akanksha Badola">MD-12_Akanksha Badola</option>
									<option value="MD-11_Shivam Gupta">MD-11_Shivam Gupta</option>
									<option value="MD-13_Om Prakash">MD-13_Om Prakash</option>
									<option value="MD-14_Vaibhav Sharma">MD-14_Vaibhav Sharma</option>
                    	        </select>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Fathers Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="fname" class="form-control" placeholder="Enter Fathers Name" required>
		                            </div>
		                        </div>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Communication Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="caddress" class="form-control" placeholder="Enter Communication Address" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Permanent Address</label><br>
								<input type="checkbox" id="psc_address" name="psc_address" onchange="setp_add(this.checked)"/>
								<span>Check if permanent address is same as communication address</span>
		                        <div class="form-group" id="psc_address_div">
		                            <div class="form-line">
		                                <input type="text" name="paddress" class="form-control" placeholder="Enter Permanent Address">
		                            </div>
		                        </div>
                		 	</div>
							<script>
								function setp_add(checked){
									var pscAddressDiv = document.getElementById('psc_address_div');
									if(checked){
										pscAddressDiv.style.display = 'none';
									}else{
										pscAddressDiv.style.display = 'block';
									}
								}
							</script>
							
							 <div class="col-md-12">            		 	
		                        <label>Adhaar</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="adhaar" class="form-control" placeholder="Enter Adhaar" required>
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
								<label>Qualification</label>
                    	        	<select name="qualification" required class="form-control">
										<option value="CA">CA</option>
										<option value="CS">CS</option>
										<option value="ICWA">ICWA</option>
										<option value="MBA">MBA</option>
										<option value="Graduation">Graduation</option>
										<option value="Senior Secondary">Senior Secondary</option>
										<option value="DISA">DISA</option>
										<option value="CISA">CISA</option>
										<option value="Registered Valuer">Registered Valuer</option>
										<option value="IRP">IRP</option>
										<option value="CFA">CFA</option>
										<option value="CPA">CPA</option>
									</select>
									
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Membership No.</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="membership_no" class="form-control" placeholder="Enter Membership No." >
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
		                                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>DOB</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="dob" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>


                            <div class="col-md-12">            		 	
		                        <label>DOJ</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="doj" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

							
							 <div class="col-md-12">            		 	
		                        <label>Date of Resignation</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="date_n" class="form-control">
		                            </div>
		                        </div>
                		 	</div>

                             <div class="col-md-12">            		 	
		                        <label>Status</label>
                    	        <select name="status" required class="form-control">
                    	            <option value="">Status</option>
                    	            <option value="0">Active</option>
                    	            <option value="1">In-Active</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>CTC Annual</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="ctc_annual" onkeyup="get_ctc(this.value)" id="ctc_annual" class="form-control" placeholder="Enter CTC Annual" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>CTC Per Hour</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="ctc_per_hour" id="ctc_per_hour" readonly class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Recoverable/Hour</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="rc_per_hour" id="rc_per_hour" readonly class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

							<script>
								function get_ctc(e){
									var ctc_phr = e/2072;
									var new_ctc_ph = ctc_phr*3;
									document.getElementById('ctc_per_hour').value = ctc_phr.toFixed(2);
									document.getElementById('rc_per_hour').value = new_ctc_ph.toFixed(2);
								}
							</script>

                            

                    	</div>
                        <a href="{{ url('Admin/employee-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('Admin/homefooter')
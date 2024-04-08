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
                    <form  method="post" action="{{ url('Admin/edit-employee')}}/{{ $tabledata->id }}" >
                        @csrf
                    	<div class="row">

                		 	<div class="col-md-12">            		 	
		                        <label>Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->name }}" name="name" class="form-control" placeholder="Enter Name" required>
		                                <input type="hidden" value="{{ $tabledata->id }}" name="employee_id" class="form-control" placeholder="Enter Name" required>
		                            </div>
		                        </div>
            		 		</div>
                            
                		 	<div class="col-md-12">            		 	
		                        <label>official Mail ID</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->official_email }}" name="official_email" class="form-control" placeholder="Enter Official Mail" required>
		                            </div>
		                        </div>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Entity</label>
                    	        <select name="entity" required class="form-control">
                    	            <option @if($tabledata->entity =="") selected @endif value="">Entity</option>
									<?php $entity = DB::table('entity')->get(); ?>
									@foreach($entity as $entities)
                    	            <option value="{{ $entities->name }}" @if($tabledata->entity == $entities->name) selected @endif>{{ $entities->name }}</option>
									@endforeach
                    	        </select>
                		 	</div>


							 <div class="col-md-12">            		 	
		                        <label>Department</label>
                    	        <select name="department" required class="form-control">
                    	            <option @if($tabledata->department == "") selected @endif value="" >Select</option>
                    	            <option @if($tabledata->department == "Admin") selected @endif value="Admin" >Admin</option>
                    	            <option @if($tabledata->department == "Assurance") selected @endif value="Assurance" >Assurance</option>
                    	            <option @if($tabledata->department == "Audit") selected @endif value="Audit" >Audit</option>
                    	            <option @if($tabledata->department == "Consulting") selected @endif value="Consulting" >Consulting</option>
                    	            <option @if($tabledata->department == "Housekeeping") selected @endif value="Housekeeping" >Housekeeping</option>
                    	            <option @if($tabledata->department == "Information Technology") selected @endif value="Information Technology" >Information Technology</option>
                    	            <option @if($tabledata->department == "Risk Advisory") selected @endif value="Risk Advisory" >Risk Advisory</option>
                    	            <option @if($tabledata->department == "Secretarial") selected @endif value="Secretarial" >Secretarial</option>
                    	            <option @if($tabledata->department == "Taxation") selected @endif value="Taxation" >Taxation</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">      		 	
		                        <label>Sub-Department</label>
                    	        <select name="sub_department" required class="form-control">
                    	            <option @if($tabledata->subdepartment =="") selected @endif value="" >Select</option>
                    	            <option @if($tabledata->subdepartment == "Admin") selected @endif value="Admin" >Admin</option>
                    	            <option @if($tabledata->subdepartment == "Assurance") selected @endif value="Assurance" >Assurance</option>
                    	            <option @if($tabledata->subdepartment == "Audit") selected @endif value="Audit" >Audit</option>
                    	            <option @if($tabledata->subdepartment == "Consulting") selected @endif value="Consulting" >Consulting</option>
                    	            <option @if($tabledata->subdepartment == "Consulting SLA") selected @endif value="Consulting SLA" >Consulting SLA</option>
                    	            <option @if($tabledata->subdepartment == "Housekeeping") selected @endif value="Housekeeping" >Housekeeping</option>
                    	            <option @if($tabledata->subdepartment == "Information Technology") selected @endif value="Information Technology" >Information Technology</option>
                    	            <option @if($tabledata->subdepartment == "Risk Advisory") selected @endif value="Risk Advisory" >Risk Advisory</option>
                    	            <option @if($tabledata->subdepartment == "Secretarial") selected @endif value="Secretarial" >Secretarial</option>
                    	            <option @if($tabledata->subdepartment == "Taxation") selected @endif value="Taxation" >Taxation</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">
		                        <label>Employee PC</label>
                    	        <select name="emppc" required class="form-control">
                    	            <option  @if($tabledata->emppc =="") selected @endif value="">Select</option>
                    	            <option  @if($tabledata->emppc =="Jasola") selected @endif value="Jasola">Jasola</option>
                    	            <option  @if($tabledata->emppc =="MB") selected @endif value="MB">MB</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">     		 	
		                        <label>Location</label>
                    	        <select name="location" required class="form-control">
                    	            <option  @if($tabledata->location =="") selected @endif value="" >Select User Status</option>
                    	            <option @if($tabledata->location =="Maharani Bagh") selected @endif value="Maharani Bagh">Maharani Bagh</option>
                    	            <option @if($tabledata->location =="Govindpuri") selected @endif value="Govindpuri">Govindpuri</option>
                    	            <option @if($tabledata->location =="Gurugram") selected @endif value="Gurugram">Gurugram</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Designation</label>
                    	        <select value="{{ $tabledata->designation }}" name="designation" required class="form-control">
                    	            <option @if($tabledata->designation =="Senior Partner") selected @endif value="Senior Partner">Senior Partner</option>
									<option @if($tabledata->designation =="Partner") selected @endif value="Partner">Partner</option>
									<option @if($tabledata->designation =="Director") selected @endif value="Director">Director</option>
									<option @if($tabledata->designation =="Senior Manager") selected @endif value="Senior Manager">Senior Manager</option>
									<option @if($tabledata->designation =="Manager") selected @endif value="Manager">Manager</option>
									<option @if($tabledata->designation =="Associate Manager") selected @endif value="Associate Manager">Associate Manager</option>
									<option @if($tabledata->designation =="Senior Executive") selected @endif value="Senior Executive">Senior Executive</option>
									<option @if($tabledata->designation =="Executive") selected @endif value="Executive">Executive</option>
									<option @if($tabledata->designation =="Associate Executive") selected @endif value="Associate Executive">Associate Executive</option>
									<option @if($tabledata->designation =="Intern-I") selected @endif value="Intern-I">Intern-I</option>
									<option @if($tabledata->designation =="Intern-II") selected @endif value="Intern-II">Intern-II</option>
									<option @if($tabledata->designation =="Intern-Final") selected @endif value="Intern-Final">Intern-Final</option>
                    	        </select>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Moderator</label>
                    	        <select value="{{ $tabledata->moderator }}" name="moderator" required class="form-control">
                    	            <option value="" @if($tabledata->moderator =="") selected @endif  >Select</option>
									<option @if($tabledata->moderator =="MD-01_Kapil Mittal") selected @endif value="MD-01_Kapil Mittal">MD-01_Kapil Mittal</option>
									<option @if($tabledata->moderator =="MD-02_Sanjay Agarwal") selected @endif value="MD-02_Sanjay Agarwal">MD-02_Sanjay Agarwal</option>
									<option @if($tabledata->moderator =="MD-03_Siddharth Bansal") selected @endif value="MD-03_Siddharth Bansal">MD-03_Siddharth Bansal</option>
									<option @if($tabledata->moderator =="MD-04_Pawan Kumar") selected @endif value="MD-04_Pawan Kumar Jain">MD-04_Pawan Kumar Jain</option>
									<option @if($tabledata->moderator =="MD-05_Amit Singh") selected @endif value="MD-05_Amit Singh">MD-05_Amit Singh</option>
									<option @if($tabledata->moderator =="MD-06_Krishan Gopal") selected @endif value="MD-06_Krishan Gopal">MD-06_Krishan Gopal</option>
									<option @if($tabledata->moderator =="MD-07_Deepak Goyal") selected @endif value="MD-07_Deepak Goyal">MD-07_Deepak Goyal</option>
									<option @if($tabledata->moderator =="MD-08_Naresh Goel") selected @endif value="MD-08_Naresh Goel">MD-08_Naresh Goel</option>
									<option @if($tabledata->moderator =="MD-09_Sumit Shakya") selected @endif value="MD-09_Sumit Shakya">MD-09_Sumit Shakya</option>
									<option @if($tabledata->moderator =="MD-10_Pulkit Kumar") selected @endif value="MD-10_Pulkit Kumar">MD-10_Pulkit Kumar</option>
									<option @if($tabledata->moderator =="MD-12_Akanksha Badola") selected @endif value="MD-12_Akanksha Badola">MD-12_Akanksha Badola</option>
									<option @if($tabledata->moderator =="MD-11_Shivam Gupta") selected @endif value="MD-11_Shivam Gupta">MD-11_Shivam Gupta</option>
									<option @if($tabledata->moderator =="MD-13_Om Prakash") selected @endif value="MD-13_Om Prakash">MD-13_Om Prakash</option>
									<option @if($tabledata->moderator =="MD-14_Vaibhav Sharma") selected @endif value="MD-14_Vaibhav Sharma">MD-14_Vaibhav Sharma</option>
                    	        </select>
                		 	</div>

                		 	<div class="col-md-12">            		 	
		                        <label>Fathers Name</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->fname }}" name="fname" class="form-control" placeholder="Enter Fathers Name" required>
		                            </div>
		                        </div>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Communication Address</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->caddress }}" name="caddress" class="form-control" placeholder="Enter Communication Address" required>
		                            </div>
		                        </div>
                		 	</div>

							 <div class="col-md-12">            		 	
		                        <label>Permanent Address</label><br>
								<input type="checkbox" id="psc_address" @if($tabledata->caddress == $tabledata->paddress) checked @endif name="psc_address" onchange="setp_add(this.checked)"/>
								<span>Check if permanent address is same as communication address</span>
		                        <div class="form-group" id="psc_address_div">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->paddress }}" name="paddress" class="form-control" placeholder="Enter Permanent Address">
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
		                                <input type="text" value="{{ $tabledata->adhaar }}" name="adhaar" class="form-control" placeholder="Enter Adhaar" required>
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
		                        <label>Qualification</label>
								<select name="qualification" required class="form-control">
									<option @if($tabledata->qualification =="") selected @endif value="">Select Qualification</option>
									<option @if($tabledata->qualification =="CA") selected @endif value="CA">CA</option>
									<option @if($tabledata->qualification =="CS") selected @endif value="CS">CS</option>
									<option @if($tabledata->qualification =="ICWA") selected @endif value="ICWA">ICWA</option>
									<option @if($tabledata->qualification =="MBA") selected @endif value="MBA">MBA</option>
									<option @if($tabledata->qualification =="Graduation") selected @endif value="Graduation">Graduation</option>
									<option @if($tabledata->qualification =="Senior Secondary") selected @endif value="Senior Secondary">Senior Secondary</option>
									<option @if($tabledata->qualification =="DISA") selected @endif value="DISA">DISA</option>
									<option @if($tabledata->qualification =="CISA") selected @endif value="CISA">CISA</option>
									<option @if($tabledata->qualification =="Registered Valuer") selected @endif value="Registered Valuer">Registered Valuer</option>
									<option @if($tabledata->qualification =="IRP") selected @endif value="IRP">IRP</option>
									<option @if($tabledata->qualification =="CFA") selected @endif value="CFA">CFA</option>
									<option @if($tabledata->qualification =="CPA") selected @endif value="CPA">CPA</option>
								</select>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Membership No.</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->membership_no }}" name="membership_no" class="form-control" placeholder="Enter Membership No." >
		                            </div>
		                        </div>
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
		                        <label>DOB</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" value="{{ $tabledata->dob }}" name="dob" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>DOJ</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" value="{{ $tabledata->doj }}" name="doj" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

							
							<div class="col-md-12">            		 	
		                        <label>Date of Resignation</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" value="{{ $tabledata->date_n }}" name="date_n" class="form-control">
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-12">            		 	
		                        <label>Status</label>
                    	        <select value="{{ $tabledata->status }}" name="status" required class="form-control">
                    	            <option @if($tabledata->status =="") selected @endif value="">Status</option>
                    	            <option @if($tabledata->status =="0") selected @endif value="0">Active</option>
                    	            <option @if($tabledata->status =="1") selected @endif value="1">In-Active</option>
                    	        </select>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>CTC Annual</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->ctc_annual }}" name="ctc_annual" onkeyup="get_ctc(this.value)" id="ctc_annual" class="form-control" placeholder="Enter CTC Annual" required>
		                            </div>
		                        </div>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>CTC Per Hour</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->ctc_per_hour }}" name="ctc_per_hour" id="ctc_per_hour" readonly class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

							<div class="col-md-12">            		 	
		                        <label>Recoverable/Hour</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" value="{{ $tabledata->rc_per_hour }}" name="rc_per_hour" id="rc_per_hour" readonly class="form-control" required>
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
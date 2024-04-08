@include('Admin/homeheader')
<style>
    .cur_poi:hover{
        cursor:pointer;
    }
</style>

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
                    <form  method="post" action="{{ url('Admin/add-assignment_map') }}" >
                        @csrf
                    	<div class="row">

							<div class="col-md-4">            		 	
		                        <label>Client</label>
                    	        <select name="client_id"  class="form-control">
                                    <?php $client = DB::table('client')->get(); ?>
                    	            <option value="" required>Select Client</option>
                                    @foreach($client as $clients)
                    	            <option value="{{ $clients->id }}" required>{{ $clients->name }}</option>
                                    @endforeach
                    	        </select>
                		 	</div>

                             <div class="col-md-4">            		 	
		                        <label>Assignment</label>
                    	        <select name="assignemnt_id"  class="form-control">
                                    <?php $assignment = DB::table('assignment')->get(); ?>
                    	            <option value="" required>Select Assignment</option>
                                    @foreach($assignment as $assignments)
                    	            <option value="{{ $assignments->id }}" required>{{ $assignments->name }}</option>
                                    @endforeach
                    	        </select>
                		 	</div>
                            
							<div class="col-md-4">            		 	
		                        <label>Period End</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="date" name="period_end" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>

                            <div class="col-md-4">            		 	
		                        <label>Period type</label>
                    	        <select name="period"  class="form-control">
                    	            <option value="none" required>Period Type</option>
									<option value="Annual">Annual</option>
									<option value="Half Yearly">Half Yearly</option>
									<option value="Quarterly">Quarterly</option>
									<option value="Monthly">Monthly</option>
									<option value="One-time">One-time</option>
                    	        </select>
                		 	</div>
							
							<div class="col-md-4">            		 	
		                        <label>Total Agreed Fees</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="total_agreed_fees" id="agreed_fees" oninput="set_agreed_fees()" class="form-control" required>
		                            </div>
		                        </div>
                		 	</div>
							 
							<div class="col-md-4">            		 	
							</div>
											
							<div class="col-md-2"><button class="btn btn-primary" type="button" id="add_row">Add Row +</button></div>

							<div class="row mt-3 table_head_row table-responsive">

								<table border="1px solid black" class="table table-bordered table-striped" cellspacing="0" width="70%" id="table_tg" >

									<thead class="table thead">
										<tr class="table tr">
											<th class="table th">Employee</th>
											<th class="table th">From Date</th>
											<th class="table th">To Date</th>
											<th class="table th">Estimate Hours</th>
											<th class="table th">Recoverable Cost</th>
											<th class="table th">Actual Cost</th>
											<th class="table th">TL</th>
											<th class="table th">Agreed Fees</th>
											<th class="table th">Action</th>
										</tr>
									</thead>

									<tbody class="table tbody">

										<tr class="table tr" id="row_1">
											<td class="table td">
												<select name="employee_id[]"  class="form-control" id="employee_1" onchange="fetchemployee(1)">
													<?php $employee = DB::table('employee')->get(); ?>
													<option value="" required>Select Employee</option>
													@foreach($employee as $employees)
													<option value="{{ $employees->id }}" required>{{ $employees->name }}</option>
													@endforeach
												</select>
												<input type="hidden" id="hourly_1" name="hourly[]" value="">
												<input type="hidden" id="rc_hourly_1" name="rc_hourly[]" value="">
											</td>

											<td class="table td"><input type="date" id="fromdate_1" name="from_date[]"></td>
											<td class="table td"><input type="date" id="todate_1" name="to_date[]"></td>
											<td class="table td"><input type="text" id="estimate_1" oninput="calculateTotal(1)" name="hours[]"></td>
											<td class="table td"><input type="text" id="recoverable_c_1" readonly name="rc_cost[]"></td>
											<td class="table td"><input type="text" id="actual_c_1" readonly name="actual_cost[]"></td>
											<td class="table td"><input type="checkbox" id="tl_1" name="tl[]" value="1"><span>Yes</span></td>
											<td class="table td"><input type="text" id="agreed_1" oninput="set_agreed_fees()" name="agreed_fees[]"></td>
											<td class="table td"><i class="fa fa-trash cur_poi" onclick="del_fun(1)"></i></td>
										</tr>

									</tbody>


								</table>

							</div>


							<div class="col-md-3">            		 	
		                        <label>Total Recoverable Cost</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" id="total_recoverable_c" name="total_recoverable_c" class="form-control" onclick="set_oth_val()" readonly required>
		                            </div>
		                        </div>
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Recovery Margin</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="recovery_margin" id="recovery_margin" class="form-control" readonly required>
		                            </div>
		                        </div>
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Total Actual Cost</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="total_actual_c" id="total_actual_c" class="form-control" readonly required>
		                            </div>
		                        </div>
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Actual Margin</label>
		                        <div class="form-group">
		                            <div class="form-line">
		                                <input type="text" name="actual_margin" id="actual_margin" class="form-control" readonly required>
		                            </div>
		                        </div>
                		 	</div>

							 <?php $employeeBD = DB::table('employee')->whereIn('designation',['Senior Partner','Partner'])->get(); ?>
							 <?php $employeexceptBd = DB::table('employee')->whereNotIn('designation',['Senior Partner','Partner'])->get(); ?>

							 <div class="col-md-3">            		 	
		                        <label>BD Partner</label>
								
								<select name="bd"  class="form-control">
									<option value="" required>BD Partner</option>
									@foreach($employeeBD as $employeeBDs)
									<option value="{{ $employeeBDs->id }}" required>{{ $employeeBDs->name }}</option>
									@endforeach
								</select>
								
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Co BD Partner</label>
								<select name="co_bd_1"  class="form-control">
									<option value="" required>Co BD Partner</option>
									@foreach($employeexceptBd as $employeexceptBds)
									<option value="{{ $employeexceptBds->id }}" required>{{ $employeexceptBds->name }}</option>
									@endforeach
								</select>
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Co BD Partner</label>
								<select name="co_bd_2"  class="form-control">
									<option value="" required>Co BD Partner</option>
									@foreach($employeexceptBd as $employeexceptBds)
									<option value="{{ $employeexceptBds->id }}" required>{{ $employeexceptBds->name }}</option>
									@endforeach
								</select>
                		 	</div>
							 <div class="col-md-3">            		 	
		                        <label>Co BD Partner</label>
								<select name="co_bd_3"  class="form-control">
									<option value="" required>Co BD Partner</option>
									@foreach($employeexceptBd as $employeexceptBds)
									<option value="{{ $employeexceptBds->id }}" required>{{ $employeexceptBds->name }}</option>
									@endforeach
								</select>
                		 	</div>

							<div class="col-md-6">          

		                        <label>Executive Partner</label>
								<select name="executive_bd"  class="form-control">
									<option value="" required>Executive Partner</option>
									@foreach($employeeBD as $employeeBDs)
									<option value="{{ $employeeBDs->id }}" required>{{ $employeeBDs->name }}</option>
									@endforeach
								</select>

                		 	</div>

							<div class="col-md-6">
		                        <label>Status</label>
                    	        <select name="status"  class="form-control">
                    	            <option value="" required>Select User Status</option>
                    	            <option value="0" required>Active</option>
                    	            <option value="1" required>In-Active</option>
                    	        </select>
                		 	</div>

                    	</div>
                        <a href="{{ url('Admin/assignment_map-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>


<script>

    function set_oth_val(){

        var tr_len = $('#table_tg > tbody > tr.table').length;
		val_on = 0;
		val_tw = 0;
		for(i=0;i<tr_len;i++){
			var keyv = i+1;
			val_on += parseFloat($('#recoverable_c_'+keyv).val());
			val_tw += parseFloat($('#actual_c_'+keyv).val());
		}
		$('#total_recoverable_c').val(val_on.toFixed(2));
		$('#total_actual_c').val(val_tw.toFixed(2));
		
		var agreed_fees = $('#agreed_fees').val();

		var actual_margin_val = 1-val_tw/agreed_fees;
		var recovery_margin_val = 1-val_on/agreed_fees;
		var actual_margin = $('#actual_margin').val(actual_margin_val);
		var recovery_margin = $('#recovery_margin').val(recovery_margin_val);
		
	}

    function set_agreed_fees(){

		set_oth_val();

        var agreed_fees_val = $('#agreed_fees').val();
		var total_recoverable_c_val = $('#total_recoverable_c').val();

        var tr_len = $('#table_tg > tbody > tr.table').length;
		for(i=0;i<tr_len;i++){
			var keyv = i+1;
			var rec_c_val = $('#recoverable_c_'+keyv).val();
			var agreed_v_val = agreed_fees_val*(rec_c_val/total_recoverable_c_val);
			$('#agreed_'+keyv).val(parseFloat(agreed_v_val).toFixed(2));
		}

	}

    function del_fun(e){
        var tr_len = $('#table_tg > tbody > tr.table').length;
        if(tr_len < 2){
            alert('Atleast One Data is required');
        } else{
            $('#table_tg > tbody #row_'+e).hide();
        }
    }

    $( document ).ready(function() {
        $('#table_tg').DataTable( {
            "sScrollX": '100%'
        } );
    });

    $('#add_row').on('click',function(){
        var tr_len = $('#table_tg > tbody > tr.table').length;
        var nex_len = tr_len + 1; 
        $('#table_tg > tbody').append('<tr class="table tr" id="row_'+nex_len+'">'+
                                        '<td class="table td">'+
                                            '<select name="employee_id[]"  class="form-control" required id="employee_'+nex_len+'" onchange="fetchemployee('+nex_len+')">'+
                                                <?php $employee = DB::table('employee')->get(); ?>
                                                '<option value="">Select employee</option>'+
                                                <?php foreach($employee as $employees) { ?>
                                                '<option value="{{ $employees->id }}">{{ $employees->name }}</option>'+
                                                <?php } ?>
                                            '</select>'+
											'<input type="hidden" id="hourly_'+nex_len+'" name="hourly[]" value="">'+
											'<input type="hidden" id="rc_hourly_'+nex_len+'" name="rc_hourly[]" value="">'+
                                        '</td>'+
                                        '<td class="table td"><input type="date" id="fromdate_'+nex_len+'" name="from_date[]"></td>'+
                                        '<td class="table td"><input type="date" id="todate_'+nex_len+'" name="to_date[]"></td>'+
                                        '<td class="table td"><input type="text" id="estimate_'+nex_len+'" oninput="calculateTotal('+nex_len+')" name="hours[]"></td>'+
                                        '<td class="table td"><input type="text" id="recoverable_c_'+nex_len+'" readonly name="rc_cost[]"></td>'+
                                        '<td class="table td"><input type="text" id="actual_c_'+nex_len+'" readonly name="actual_cost[]"></td>'+
                                        '<td class="table td"><input type="checkbox" id="tl_'+nex_len+'" name="tl[]" value="1" ><span>Yes</span></td>'+
                                        '<td class="table td"><input type="text" id="agreed_'+nex_len+'" name="agreed_fees[]" oninput="set_agreed_fees()"></td>'+
                                        '<td class="table td"><i class="fa fa-trash cur_poi" onclick="del_fun('+nex_len+')"></i></td>'+
                                    '</tr>');
    });



	function fetchemployee(newnum) {
		var Itemdata = document.getElementById('employee_'+newnum).value;
		
		for(i=1;i<newnum;i++){
			var iItemdata = document.getElementById('employee_'+i).value;
			if(Itemdata==iItemdata){
				var duplicateEntry = "Dupicate item selected"
			}
		}

		if(duplicateEntry){
			alert(duplicateEntry);
		}else{
			if (Itemdata !== "") {


				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var productData = JSON.parse(this.responseText);
						var EmpData = productData.data;
						document.getElementById('hourly_'+newnum).value = EmpData.ctc_per_hour;
						document.getElementById('rc_hourly_'+newnum).value = EmpData.rc_per_hour;
					}
				};
				xhr.open("GET", "{{ url('/Admin/getEmpData') }}?Itemdata=" + Itemdata, true);
				xhr.send();

		
			} else {
				document.getElementById('hourly_'+newnum).value = "";
				document.getElementById('rc_hourly_'+newnum).value = "";
			}
		}
	}


	function calculateTotal(newnum) {
		
		var estimate = document.getElementById('estimate_'+newnum).value;
		var hourly  = document.getElementById('hourly_'+newnum).value;
		var rc_hourly  = document.getElementById('rc_hourly_'+newnum).value;

		var estim = parseFloat(estimate?estimate:1);
		var hour = parseFloat(hourly?hourly:0);
		var rc_hour = parseFloat(rc_hourly?rc_hourly:0);

		var total;

		total = estim * hour;
		rc_total = estim * rc_hour;
		document.getElementById('actual_c_'+newnum).value = total.toFixed(2);
		document.getElementById('recoverable_c_'+newnum).value = rc_total.toFixed(2);

	}

</script>





@include('Admin/homefooter')
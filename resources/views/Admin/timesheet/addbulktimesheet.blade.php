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
                <div class="card-body">
                    <form  method="post" action="{{ url('Admin/add-timesheet')}}" >
                        @csrf

                    	<div class="row"><button class="btn btn-primary" type="button" id="add_row">Add Row +</button></div>

                    	<div class="row mt-3 table_head_row table-responsive">

                            <table border="1px solid black" class="table table-bordered table-striped" cellspacing="0" width="100%" id="table_tg" >

                                <thead class="table thead">
                                    <tr class="table tr">
                                        <th class="table th">Client</th>
                                        <th class="table th">Assignment</th>
                                        <th class="table th">Hours</th>
                                        <th class="table th">Remark</th>
                                        <th class="table th">Mode</th>
                                        <th class="table th">Location</th>
                                        <th class="table th">Amount</th>
                                        <th class="table th">Location GPS</th>
                                        <th class="table th">Location Address</th>
                                        <th class="table th">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="table tbody">

                                    <tr class="table tr" id="row_1">
                                        <td class="table td">
                                            <select name="client[]"  class="form-control" id="client_1">
                                                <?php $client = DB::table('client')->get(); ?>
                                                <option value="" required>Select Client</option>
                                                @foreach($client as $clients)
                                                <option value="{{ $clients->id }}" required>{{ $clients->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="table td">
                                            <select id="assignment_1" name="assignment[]"  class="form-control">
                                                <?php $assignment = DB::table('assignment')->get(); ?>
                                                <option value="" required>Select Assignment</option>
                                                @foreach($assignment as $assignments)
                                                <option value="{{ $assignments->id }}" required>{{ $assignments->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td class="table td"><input type="time" id="hours_1" name="hours[]"></td>
                                        <td class="table td"><input type="text" id="remark_1" name="remark[]"></td>
                                        <td class="table td"><input type="text" id="mode_1" name="mode[]"></td>
                                        <td class="table td"><input type="text" id="amount_1" name="amount[]"></td>
                                        <td class="table td"><input type="text" id="location_1" name="location[]"></td>
                                        <td class="table td"><input type="text" id="location_gps_1" name="location_gps[]"></td>
                                        <td class="table td"><input type="text" id="location_address_1" name="location_address[]"></td>
                                        <td class="table td"><i class="fa fa-trash cur_poi" onclick="del_fun(1)"></i></td>
                                    </tr>

                                </tbody>


                            </table>

                    	</div>
                        <a href="{{ url('Admin/users-list')}}" class="btn btn-secondry m-t-15 waves-effect">Cancel</a>
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
                                            '<select name="client[]"  class="form-control" required id="client_'+nex_len+'">'+
                                                <?php $client = DB::table('client')->get(); ?>
                                                '<option value="">Select Client</option>'+
                                                <?php foreach($client as $clients) { ?>
                                                '<option value="{{ $clients->id }}">{{ $clients->name }}</option>'+
                                                <?php } ?>
                                            '</select>'+
                                        '</td>'+
                                        '<td class="table td">'+
                                            '<select id="assignment_'+nex_len+'" name="assignment[]"  class="form-control">'+
                                                <?php $assignment = DB::table('assignment')->get(); ?>
                                                '<option value="" required>Select Assignment</option>'+
                                                <?php foreach($assignment as $assignments){ ?>
                                                '<option value="{{ $assignments->id }}" required>{{ $assignments->name }}</option>'+
                                                <?php } ?>
                                            '</select>'+
                                        '</td>'+
                                        '<td class="table td"><input type="time" id="hours_'+nex_len+'" name="hours[]"></td>'+
                                        '<td class="table td"><input type="text" id="remark_'+nex_len+'" name="remark[]"></td>'+
                                        '<td class="table td"><input type="text" id="mode_'+nex_len+'" name="mode[]"></td>'+
                                        '<td class="table td"><input type="text" id="amount_'+nex_len+'" name="amount[]"></td>'+
                                        '<td class="table td"><input type="text" id="location_'+nex_len+'" name="location[]"></td>'+
                                        '<td class="table td"><input type="text" id="location_gps_'+nex_len+'" name="location_gps[]"></td>'+
                                        '<td class="table td"><input type="text" id="location_address_'+nex_len+'" name="location_address[]"></td>'+
                                        '<td class="table td"><i class="fa fa-trash cur_poi" onclick="del_fun('+nex_len+')"></i></td>'+
                                    '</tr>');
    });


</script>

@include('Admin/homefooter')
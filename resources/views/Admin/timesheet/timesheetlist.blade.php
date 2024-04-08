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
                		<!-- <div class="col-md-6 ">
                			<div style="text-align: end;">
        			      		<a  href="{{ url('Admin/add-timesheet')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                			</div>
                		</div> -->
                        <div class="col-md-6 d-flex">
                            <form action="{{ url('Admin/timesheet-list') }}" method="post" enctype="multipart/form-data">@csrf
                                <select name="employee_id"  class="form-control">
                                    <?php $employee = DB::table('employee')->get(); ?>
                                    <option value="" @if($selected == "") selected @endif >Select Employee</option>
                                    @foreach($employee as $employees)
                                    <option value="{{ $employees->id }}" @if($employees->id == $selected) selected @endif >{{ $employees->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                		</div>
                	</div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Client</th>
                                    <th>Assignment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Client</th>
                                    <th>Assignment</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(count($assignment_map_employee) > 0)

                                @foreach($assignment_map_employee as $key=>$data)

                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $data->assignment_map->client->name }}</td>
                                        <td>{{ $data->assignment_map->assignment->name }}</td>
                                        <td>  
                                            <a href="edit-timesheet/{{ $data->id }}" class="btn btn-sm btn-success btn-circle">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <!-- <a href="delete-timesheet?id={{ $data->id }}"class="btn btn-sm btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </a>                                         -->
                                        </td>
                                    </tr>

                                @endforeach


                                @else
                                    <tr>
                                        <td colspan="5">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin/homefooter')
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
                		<div class="col-md-6 ">
                			<div style="text-align: end;">
        			      		<a  href="{{ url('Admin/add-assignment_map')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
                			</div>
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
                                    <th>Client Name</th>
                                    <th>Assignment Name</th>
                                    <th>Assignment Practice</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Client Name</th>
                                    <th>Assignment Name</th>
                                    <th>Assignment Practice</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($datatable as $key=> $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->client->name }}</td>
                                    <td>{{ $data->assignment->name }}</td>
                                    <td>{{ $data->assignment->practice }}</td>
                                    <td>  
                                        <a href="edit-assignment_map?id={{ $data->id }}" class="btn btn-sm btn-success btn-circle">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="delete-assignment_map?id={{ $data->id }}"class="btn btn-sm btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>                                        
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Admin/homefooter')
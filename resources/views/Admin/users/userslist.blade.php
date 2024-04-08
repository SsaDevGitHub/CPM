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
                            <?php $title = "Users List"; ?>
		                    <h6 class="m-0 font-weight-bold text-primary"> <?= $title?>
		                    </h6>
		                	<p class="m-0"><a href="{{ url('Admin/')}}">Dashboard</a> / <?= $title?></p>
                		</div>
                		<div class="col-md-6 ">
                			<div style="text-align: end;">
        			      		<a  href="{{ url('Admin/add-users')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($datatable as $key=> $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>  
                                        <a href="edit-users?id={{ $data->user_id }}" class="btn btn-sm btn-success btn-circle">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="#"class="btn btn-sm btn-danger btn-circle">
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
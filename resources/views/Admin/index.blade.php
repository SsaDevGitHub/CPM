@include('Admin/homeheader')



<!-- Begin Page Content -->

<div class="container-fluid">

  <!-- Page Heading -->

  <!-- Content Row -->

  <div class="row">

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">

      <div class="card border-left-primary shadow h-100 py-2">

        <div class="card-body">

          <div class="row no-gutters align-items-center">

            <div class="col mr-2">

              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Users</div>

              <div class="h5 mb-0 font-weight-bold text-gray-800">

                {{ $user }}

              </div>

            </div>

            <div class="col-auto">

              <i class="fas fa-user fa-2x text-gray-300"></i>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Content Row -->

@include('Admin/homefooter')
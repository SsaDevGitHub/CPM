<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> SSA CLOUD | Admin Panel</title>
        <!-- Custom fonts for this template-->
        <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="{{ asset('admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
        <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <script src="{{ asset('admin_assets/https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js')}}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <section class="">
	    <div class="container-fluid">
	        <!-- Outer Row -->
	        <div class="row justify-content-center">
	            <div class="col-xl-6 col-lg-6 col-md-6">
	                <div class="card o-hidden border-0 shadow-lg my-5">
	                    <div class="card-body p-0">
	                        <!-- Nested Row within Card Body -->
	                        <div class="row">
	                            <div class="col-lg-12">
	                                <div class="p-5">
	                                    <div class="text-center">
	                                        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
	                                    </div>
	                                    <form class="user" action="{{ URL('Admin/check-admin') }}" method="POST">
	                                    	{{ csrf_field() }}
	                                        <div class="form-group">
	                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
	                                        </div>
	                                        <div class="form-group">
	                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
	                                        </div>
	                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
	                                        <hr>
	                                    </form>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
    </section>
    <!-- End of Content Wrapper -->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(Session::has('alert-' . $msg))
    <script>
    
    var type = "{{ $msg }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('alert-' . $msg) }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('alert-' . $msg) }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('alert-' . $msg) }}");
            break;

        case 'danger':
            toastr.error("{{ Session::get('alert-' . $msg) }}");
            break;
    }
    
    </script>
   @endif
@endforeach


<!-- toast r alert end -->

<!-- toast r form error alert start -->

@if($errors->any())
   <script>
      toastr.error("{{ $errors->first() }}");
   </script>
@endif
                
<!-- toast r form error alert start -->

<script type="text/javascript">

  function showpass(val){
    alert(val);
  }

</script>
    </body>
</html>
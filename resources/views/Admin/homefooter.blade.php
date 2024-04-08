      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>© Copyright <?= date('Y') ?> <a href="https://ssacloud.in/" target="_blank">SSA CLOUD</a> All Rights Reserved</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
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
</body>

</html>

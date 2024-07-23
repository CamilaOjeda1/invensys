@include('header') 
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administracion</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Información del usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresar nombres">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresar apellidos">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresar email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresar usuario">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="ingresar contraseña">
                </div>
                <div class="row mt-3 justify-content-center">
                    <!-- /.col -->
                    <div class="col-2 d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                      <a href="{{ route('usuarios.lista') }}" class="btn btn-primary btn-block">Volver</a>
                    </div>
                    <!-- /.col -->
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('vendor/dist/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/dist/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('vendor/dist/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendor/dist/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/dist/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

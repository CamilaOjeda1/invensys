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
            <h1>Venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Venta</a></li>
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
                <h3 class="card-title">Nueva venta</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Código barra</label>
                                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" maxlenght="15">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad</label>
                                    <input type="number" class="form-control" id="descripcion" name="descripcion" maxlenght="45">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-2">
                              <div class="form-group">
                                  <button class="btn btn-success btn-block lista_producto">Agregar</button>
                              </div>
                          </div>
                          <div class="col-2">
                              <div class="form-group">
                                  <a href="{{ route('producto.index') }}" class="btn btn-primary btn-block">Volver</a>
                              </div>
                          </div>
                      </div> 
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Esta venta</h3>
                            </div>
                            
                            <div class="card-body p-0">
                              <table class="table table-sm">
                                <thead>
                                  <tr>
                                  <th>Producto</th>
                                  <th>Precio Unitario</th>
                                  <th>Cantidad</th>
                                  <th>Total producto</th>
                                  </tr>
                                </thead>
                                <tbody id="detalle_venta">
                                
                                </tbody>
                              </table>
                            </div>                            
                        </div>
                        <div class="row">
                          <div class="col-12">
                            <div class="callout callout-info">
                              <h5>Total venta: $1.200</h5>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-2">
                              <div class="form-group">
                                  <button class="btn btn-success btn-block lista_producto">Guardar venta</button>
                              </div>
                          </div>
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
  @include('footer') 

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
function mayus(e) {
    e.value = e.value.toUpperCase();
}

$( ".lista_producto" ).on( "click", function() {
  var producto = "<tr><td>Chocman</td>";
  producto += "<td>300</td>";
  producto += "<td>2</td>";
  producto += "<td>600</td>";
  $("#detalle_venta").append(producto);
});
</script>
</body>
</html>

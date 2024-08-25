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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <form id="buscarProductoForm">
                      @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Código barra (Debe contener ocho caracteres)</label>
                                    <input type="text" class="form-control" id="codigo_barra" name="codigo_barra" maxlenght="8">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" maxlenght="45" value="1">
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
                    </form>
                    <form action="{{ route('venta.store') }}" method="POST">
                      @csrf
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
                        <input type="hidden" value="0" id="valor_array">
                        <div class="row">
                          <div class="col-12">
                            <div class="callout callout-info">
                              <h5>Total venta: $<span class="valor_total_d">0</span></h5>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-2">
                              <div class="form-group">
                                  <button class="btn btn-success btn-block">Guardar venta</button>
                              </div>
                          </div>
                      </div>
                    </form>     
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

/*$( ".lista_producto" ).on( "click", function() {
  var producto = "<tr><td>Chocman</td>";
  producto += "<td>300</td>";
  producto += "<td>2</td>";
  producto += "<td>600</td>";
  $("#detalle_venta").append(producto);
});*/

$(document).ready(function(){
    $('#buscarProductoForm').on('submit', function(e){
        e.preventDefault();

        var codigoBarra = $('#codigo_barra').val();
        var cantidad = $('#cantidad').val();
        var indice = $('#valor_array').val();
        $.ajax({
            url: "{{ route('producto.buscar') }}",
            method: "GET",
            data: { codigo_barra: codigoBarra },
            success: function(response){
                if(response.success) {
                  var producto = "<tr><td>"+response.producto.nombre_producto+"</td>";
                  producto += "<td>$"+response.producto.precio_venta+"</td>";
                  producto += "<td>"+cantidad+"</td>";                  
                  var precio_final = response.producto.precio_venta * cantidad;
                  producto += "<td>$"+precio_final+"</td>";
                  var x = 0;
                  producto += '<input type="hidden" name="productos['+indice+'][id]" value="'+response.producto.id_producto+'">';
                  producto += '<input type="hidden" name="productos['+indice+'][cantidad]" value="'+cantidad+'">';
                  producto += '<input type="hidden" name="productos['+indice+'][valor_venta]" value="'+response.producto.precio_venta+'">';
                  producto += '<input type="hidden" name="productos['+indice+'][valor_total]" value="'+precio_final+'">';

                  producto += "</tr>";

                  $("#detalle_venta").append(producto);
                  var valor = parseInt($('.valor_total_d').text());
                  $(".valor_total_d").html(valor + precio_final);
                  $("#codigo_barra").val("");

                  $('#valor_array').val(parseInt(indice)+1);

                } else {
                    $('#productoResultado').html(`<div class="alert alert-danger">${response.message}</div>`);
                }
            },
            error: function() {
                $('#productoResultado').html('<div class="alert alert-danger">Error en la búsqueda. Intente nuevamente.</div>');
            }
        });
    });
});
</script>
</body>
</html>

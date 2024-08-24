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
            <h1>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Producto</a></li>
              <li class="breadcrumb-item active">lista</li>
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
                <h3 class="card-title">Lista de productos</h3>
                <a href="{{ route('producto.crear') }}" class="btn btn-sm btn-success" style="float:right;"><i class="fas fa-plus"></i> Crear producto </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }} (ID: {{ session('producto_id') }})
                    </div>
                @endif
                @if (session('success2'))
                    <div class="alert alert-success">
                        {{ session('success2') }} (ID: {{ session('producto_id') }})
                    </div>
                @endif
                <div class="row">
                  <div class="col-12">
                    <span class="badge badge-success">Producto con fecha de vencimiento mayor a 5 días</span><br>
                    <span class="badge badge-warning">Producto próximo a vencer (menos de 5 días)</span><br>
                    <span class="badge badge-danger">Producto con fecha vencida</span>
                  </div>
                </div> 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cod. Barra</th>
                        <th>Fecha vencimiento</th>
                        <th>$ Compra</th>
                        <th>$ Venta</th>
                        <th>Cantidad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->id_producto }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>{{ $producto->codigo_barra }}</td>
                            @php
                                $fecha = \Carbon\Carbon::parse($producto->fecha_vencimiento);
                                $hoy = \Carbon\Carbon::now();

                                $color = 'badge-success'; // Verde por defecto para fechas futuras más lejanas

                                $diasDiferencia = $fecha->diffInDays($hoy, false); // Calcula la diferencia en días, con signo

                                if ($diasDiferencia >= 0) {
                                    $color = 'badge-danger'; // Rojo si es hoy o pasada
                                } elseif ($diasDiferencia < 0 && $diasDiferencia >= -5) {
                                    $color = 'badge-warning'; // Amarillo si está dentro de los próximos 5 días y es futura
                                }

                            @endphp
                            <td><span class="badge {{ $color }}" style="font-size: 15px;">
                              {{ date('d-m-Y', strtotime($producto->fecha_vencimiento)) }}</span></td>
                            <td>{{ $producto->precio_compra }}</td>
                            <td>{{ $producto->precio_venta }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td><a  href="{{ route('producto.editar', $producto->id_producto) }}"  type="button" class="btn btn-block btn-warning btn-sm">Editar</a></td>
                            <td>
                              <form action="{{ route('producto.desactivar', $producto->id_producto) }}" method="POST" onsubmit="return confirm('¿Está seguro que desea eliminar este producto?');">
                                  @csrf
                                  @method('PATCH')
                                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
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
  $(function () {
    $("#example1").DataTable({
        "language": {
                "url": "{{ asset('vendor/js/lang/es-ES.json') }}"
        },
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
    });
  });
</script>
</body>
</html>

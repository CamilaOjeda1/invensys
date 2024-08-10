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
            <h1>Editar producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Productos</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
                <h3 class="card-title">Información del producto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('producto.actualizar', $producto->id_producto) }}" method="GET">
                    @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre producto</label>
                                    <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" maxlenght="45" value="{{ $producto->nombre_producto }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" maxlenght="45" value="{{ $producto->descripcion }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Código barra</label>
                                    <input type="text" class="form-control" id="codigo_barra" name="codigo_barra" maxlength="10" onkeyup="mayus(this);" value="{{ $producto->codigo_barra }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha vencimiento</label>
                                    <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ $producto->fecha_vencimiento }}">
                                </div>
                            </div>
                        </div>                     
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Precio compra</label>
                                    <input type="number" class="form-control" id="precio_compra" name="precio_compra" maxlenght="5" value="{{ $producto->precio_compra }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Precio venta</label>
                                    <input type="number" class="form-control" id="precio_venta" name="precio_venta" maxlenght="5" value="{{ $producto->precio_venta }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marca</label>
                                    <select id="marca" name="marca_id" class="form-control">
                                        <option value="0">Seleccione marca</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id_marca }}"
                                                {{ $producto->id_marca == $marca->id_marca ? 'selected' : '' }}>{{ $marca->nombre_marca }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Proveedor</label>
                                    <select id="proveedor" name="id_proveedor" class="form-control">
                                        <option value="0">Seleccione proveedor</option>
                                        @foreach ($proveedor as $p)
                                            <option value="{{ $p->id_proveedor }}"
                                                {{ $producto->id_proveedor == $p->id_proveedor ? 'selected' : '' }}>{{ $p->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categoría</label>
                                    <select id="categoria" name="id_categoria" class="form-control">
                                        <option value="0">Seleccione categoría</option>
                                        @foreach ($categoria as $c)
                                            <option value="{{ $c->id_categoria }}"
                                                {{ $producto->id_categoria == $c->id_categoria ? 'selected' : '' }} >{{ $c->nombre_categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Actualizar</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <a href="{{ route('producto.index') }}" class="btn btn-primary btn-block">Volver</a>
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
</script>
</body>
</html>

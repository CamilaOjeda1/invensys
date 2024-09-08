@include('header') 
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><img src="{{ asset('vendor/dist/img/logo_original.png') }}" alt="Logo_invensys" width="200"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registro</p>

      <form action="{{ route('ingreso') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" id="correo" name="email" class="form-control" placeholder="Nombre de usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('correo')
          <span style="color:red;">{{ $message }}</span>
      @enderror
        <p class="mb-1 text-right">
            <a href="{{ route('recupera') }}">¿Olvidó su contraseña?</a>
        </p>
        <div class="row mt-3 justify-content-center">
          <!-- /.col -->
          <div class="col-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->

        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

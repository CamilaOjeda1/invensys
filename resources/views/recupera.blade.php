@include('header') 
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><img src="{{ asset('vendor/dist/img/logo_original.png') }}" alt="Logo_invensys" width="200"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Recuperar contraseña</p>

      <form action="{{ route('recupera_contrasena') }}" method="get">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="ingrese email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          <!-- /.col -->
          <div class="col-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row">
        <div class="col-12">
          @error('correo')
            <span style="color:red;">{{ $message }}</span>
          @enderror
          @if (session('status'))
              <span style="color:green;">
                  {{ session('status') }}
              </span>
          @endif
        </div>
      </div>
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

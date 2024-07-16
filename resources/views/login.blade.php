@include('header') 
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b><img src="{{ config('app.sys_logo_url') }}" alt="Logo_invensys" width="40"> {{ config('app.sys_name') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingrese usuario y contraseña</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="usuario" class="form-control" placeholder="usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="mb-1 text-right">
            <a href="forgot-password.html">¿Olvidó su contraseña?</a>
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

@include('header') 
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('nav') 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            <img src="{{ config('app.sys_logo_url') }}" alt="Logo Invensys" width="40" style="vertical-align: middle; margin-right: 10px;"> 
            Bienvenido a INVENSYS 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-lg-4 col-6">          
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $ventasHoy.'/$'.number_format($sumaVentasHoy, 0, '', '.'); ?></h3>
                <p>Ventas hoy / Monto ventas hoy ($)</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">          
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $ventasMes; ?></h3>
                <p>Ventas este mes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>          
          <div class="col-lg-4 col-6">          
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $ventasTotales; ?></h3>
                <p>Total ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>                 
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-bell"></i> Productos vencidos</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                      <th style="width: 10px">ID</th>
                      <th>Producto</th>
                      <th>Fecha vencimiento</th>
                      <th style="width: 40px">Cantidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($productosVencidos as $pv)
                        <tr>
                            <td>{{ $pv->id_producto }}</td>
                            <td>{{ $pv->nombre_producto }}</td>
                            <td><span class="badge badge-danger" style="font-size: 15px;">
                              {{ date('d-m-Y', strtotime($pv->fecha_vencimiento)) }}</span></td>
                            <td>{{ $pv->cantidad }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <!--<div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                  </div>-->
                </div>                
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Productos próximos a vencer (a 5 o menos días)</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                      <th style="width: 10px">ID</th>
                      <th>Producto</th>
                      <th>Fecha vencimiento</th>
                      <th style="width: 40px">Cantidad</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($productosProximosAVencer as $ppv)
                        <tr>
                            <td>{{ $ppv->id_producto }}</td>
                            <td>{{ $ppv->nombre_producto }}</td>
                            <td><span class="badge badge-warning" style="font-size: 15px;">
                              {{ date('d-m-Y', strtotime($ppv->fecha_vencimiento)) }}</span></td>
                            <td>{{ $ppv->cantidad }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <!--<canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>-->
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
      <!-- Default box -->
      <!--<div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <div class="card-footer">
          Footer
      </div>-->

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
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>
<!--<script src="{{ asset('vendor/dist/js/demo.js') }}"></script>-->
<script>
    //var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>
</body>
</html>

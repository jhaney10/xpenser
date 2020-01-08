@extends('layouts.app2')


@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        @if(session()->has('message'))
          <div class="row">
            <div class="col alert alert-danger" role="alert">
              {{ session('message') }}
            </div>
          </div>
        @endif
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Expenses</span>
                <span class="info-box-number">
                  {{$mycurrency}} {{$day}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-bill"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expenses This Week</span>
                <span class="info-box-number">{{$mycurrency}} {{$week}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
             <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-wave"></i></span> 

              <div class="info-box-content">
                <span class="info-box-text">Expenses This Month</span>
                <span class="info-box-number">{{$mycurrency}} {{$month}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Expenses This Year</span>
                <span class="info-box-number">{{$mycurrency}} {{$year}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-6">
              <!-- PIE CHART -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Today's Expenditure</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                @if($day == 0)
                <p><i>No Expense Today</i></p>
              </div>
            </div>
                  @else
                <canvas id="pieChart" style="min-height: 350px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            @endif
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">This Week's Expenditure</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                 @if($week == 0)
                <p><i>No Expense This Week</i></p>
              </div>
            </div>
                  @else
                <div class="chart">
                  <canvas id="barChart" style="min-height: 350px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            @endif
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col">
               <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">This Year's Expenditure</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                @if($year == 0)
                <p><i>No Expense This Year</i></p>
              </div>
            </div>
                  @else
                <div class="chart">
                  <canvas id="barChart2" style="min-height: 350px; height: 350px; max-height: 450px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            @endif
            <!-- /.card -->

          </div>
        </div>

           
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('adminlte/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('adminlte/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    var id='{{$id}}';
    $.ajax({

          url: "/getdata"+"/"+id,
          type: 'GET',
          
          success:function(data){
            var json= JSON.parse(data);
            console.log(data);
            var category = [];
            var amount = [];
            var bgcolor =[];

            for ( i = 0; i < json.length; i++) {
              category.push( json[i].category);
              amount.push(json[i].total);
              bgcolor.push(json[i].bgcolor);
            }
           var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieData        = {
      labels: category,
      datasets: [
        {
          data: amount,
          backgroundColor : bgcolor,
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
   
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    });
      

          },
          error: function(err){
            console.log(err);
          }
        });
      $.ajax({
           url: "/getwkdata"+"/"+id,
          type: 'GET',
          success:function(data){
            var json= JSON.parse(data);
            console.log(json);
            var day = [];
            var total = [];

            for ( i = 0; i < json.length; i++) {
              day.push( json[i].DAY);
              total.push(json[i].total);
            }
          //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: {
        labels: day,
        datasets:[{
          label: 'Expenditure',
          data: total,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#b25058'],
          borderWidth:1
        }]
      },
      options: barChartOptions
    })
    
          },
          error: function(err){
            console.log(err);
          }
        });
    $.ajax({
           url: "/getyrdata"+"/"+id,
          type: 'GET',
          success:function(data){
            var json= JSON.parse(data);
            console.log(json);
            var month = [];
            var total = [];

            for ( i = 0; i < json.length; i++) {
              month.push( json[i].Month);
              total.push(json[i].total);
            }
          //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart2').get(0).getContext('2d')
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: {
        labels: month,
        datasets:[{
          label: 'Expenditure',
          data: total,
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          borderWidth:1
        }]
      },
      options: barChartOptions
    })
    
          },
          error: function(err){
            console.log(err);
          }
        });
    
       
});
</script>


<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
</body>
</html>
@endsection

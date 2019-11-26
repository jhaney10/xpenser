@extends('layouts.app2')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
      		<div class="row">
	<div class="col">
		@if(session()->has('message'))
          <div class="row">
            <div class="col alert alert-danger" role="alert">
              {{ session('message') }}
            </div>
          </div>
        @endif
        @if($errors->any())
              <div class="alert alert-danger" role='alert'>
                @foreach($errors->all() as $error)
                {{$error}}<br>
                @endforeach
              </div>
            @endif
		  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/changepass" method="POST">
              	@csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Old Password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">New Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="newpass1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Confirm New Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="New Password" name="newpass2">
                  </div>

                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
	</div>
</div>
      </div>
    </section>
  </div>



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
@endsection
@extends('layouts.app2')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Expense History</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Expense History</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	@if(session()->has('message'))
          <div class="row">
            <div class="col alert alert-danger" role="alert">
              {{ session('message') }}
            </div>
          </div>
        @endif
      	 <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Expense Analysis</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S/NO</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Category</th>
                  <th>Note</th>
                  <th>Account</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                	<?php $sno =1; ?>
                	@foreach($expenses as $expense)
                	<?php 
                	$note=$expense->note;
                	$id=$expense->id;
                	if ($note=='') {
                		$notes='';
                	}
                	else{
                		$notes=$expense->note;
                	}
                	?>
                	<tr>
                		<td>{{$sno++}}</td>
                		<td>{{$expense->date}}</td>
                		<td>{{$expense->amount}}</td>
                		<td>{{$expense->category}}</td>
                		<td>{{$notes}}</td>
                		<td>{{$expense->myaccount}}</td>
                		<td><button type='button' class='btn btn-success' data-toggle='modal' data-target='#edit' data-id='{{$id}}'> Edit</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete' data-id='{{$id}}'>Delete</button></td>
                	</tr>
                	@endforeach
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class='modal fade' id='edit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialogue-centered modal-md' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
       
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body' >
      	<div class="row">
      		<div class="col" id="confirmedit">
      			<form method="post" action="{{route('edit')}}">
      				@csrf
      				<!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Date:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="date" required value="" id="date">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Amount</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                    </div>
                    <input type="text" class="form-control" name="amount" value="" required id="amount">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group row">
                  <div class="col">
                    <label>Category:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-object-group"></i></span>
                      </div>
                      <select class="form-control" name="category" id="category">
                      @foreach($category as $key)
                      <option value='{{$key->id}}'>{{$key->category}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.input group -->
                  </div>
                  
                </div>
                <!-- /.form group -->

                <div class="form-group">
                  <label>Account:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                    </div>
                    <select class="form-control" name="account" id="account">
                      @foreach($account as $key)
                      <option value='{{$key->id}}'>{{$key->myaccount}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Notes:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                    </div>
                    <input type="text" class="form-control" value="" name="note" id="note">
                    <input type="text" class="form-control" value="" name="id" id="id" hidden>
                  </div>
                  <!-- /.input group -->
                </div>
               
      		</div>
      	</div>
       </div>
      
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' id="editnow">Save Changes</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- Modal 2-->
<div class='modal fade' id='delete' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialogue-centered modal-md' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
       
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
      	<div class="row">
      		<div class="col" id="confirm">
      			
      		</div>
      	</div>
       </div>
      
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <form id="deleteform" action="" method="post">
        	@csrf
        	<button type='submit' class='btn btn-primary' id="deletenow">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
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
<!-- ChartJS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script type="text/javascript">

  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });

    $('#delete').on('show.bs.modal', function(e) {
  	var id=$(e.relatedTarget).data('id');
  	var url="{{url('/delete')}}"+"/"+id;
  	$('#confirm').html('Are you sure you want to delete this entry?');
  	$('#deleteform').attr("action",url)

  });

    $('#edit').on('show.bs.modal', function(e) {
  	var id=$(e.relatedTarget).data('id');
  	  //make an ajax call to receive an array based on userid
				$.ajax({
					url: '/edit'+'/'+id,
					type: 'GET',
					success:function(data){
						var json=JSON.parse(data)
						$('#date').val(json[0]['date']);
						$('#amount').val(json[0]['amount']);
						$('#note').val(json[0]['note']);
						$('#account').val(json[0]['actid']);
						$('#category').val(json[0]['expid']);
		    			$('#id').val(json[0]['id']);
						
					},
					error: function(err){
						console.log(err);
					}
				})

  });
  });
  

</script>


<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
</body>
</html>
@endsection
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2">
    <h3 class="text-center"> Welcome Admin</h3>
</nav>
    @include('admin.layouts.sidebar')
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2>List of Product Request</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>City</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($searches as $search)
                <tr>
                  <td>{{$search->title}}</td>
                  <td>{{$search->city->city}}</td>
                  <td>{{$search->category->category_name}}</td>

                  <td>{{$search->description}}</td>
                  <td>
                    <form id="delete-form-{{ $search->id }}" method="POST" action="{{ route('search.destroy',$search->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>

                    <a href="" onclick="if(confirm('Are you sure, You Want to delete this?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $search->id }}').submit();
                                        }
                                        else{
                                            event.preventDefault();
                                        }" class="btn btn-danger">Delete</a> 
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Title</th>
                    <th>City</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
  @include('admin.layouts.footer')

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>

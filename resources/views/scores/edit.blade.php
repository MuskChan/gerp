@extends('layouts.app')

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <form id="form_data">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="card-body">
                <div class="form-group">
                  <label for="inputStatus">评价</label>
                  <select class="form-control custom-select" name="score">
                    <option selected >{{$score->score}}</option>
                    <option>On Hold</option>
                    <option>Canceled</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Project Description</label>
                  <textarea id="inputDescription" class="form-control" rows="4" name="remark">{{$score->remark}}</textarea>
                </div>
              </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary" onClick='window.history.back()'>Cancel</a>
          <input type="submit" value="Save Changes" onclick="submit()" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
  <!-- jQuery -->
  <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
@endsection

@section('script')
  <script>
    // Rating Initialization
    $(document).ready(function() {
      $('#rateMe1').mdbRate();
    });

    function del($val) {
      $('#del-id').attr('value',$val);
    }
    
    function destroy() {
      var form_data = $('#form_del').serialize();
      var $del_id = $('#del-id').val();
      $.ajax({
        url: "{{route('scores.destroy', 2)}}",
        type: 'POST',
        data: form_data,
        success: function(res){
          if(res.code == 1){
            $('#Close_del').click();
            toastr.success(res.msg);
          }else {
            toastr.error(res.message);
          }
        },
        error: function(data){
          toastr.error(data.responseJSON.message);
        }
      });
    }
    
    //评分
    function submit() {
      var form_data = $('#form_data').serialize();

      $.ajax({
        url: "{{route('scores.update', $score->id)}}",
        type: 'POST',
        data: form_data,
        success: function(res){
          if(res.code == 1){
            $('#Close').click();
            toastr.success(res.msg);
          }else {
            toastr.error(res.message);
          }
        },
        error: function(data){
          toastr.error(data.responseJSON.message);
        }
      });
    }

    //表格
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@stop

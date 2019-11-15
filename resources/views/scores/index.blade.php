@extends('layouts.app')

@section('css')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">评分标准：多个方面（心态、状态、生活、工作、学习、跑步、休息等等方面来评估）</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <button type="button" class="btn btn-block btn-default" style="width: 100px;float: right;" data-toggle="modal" data-target="#modal-default">Add</button>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>score</th>
                  <th>remark</th>
                  <th>time</th>
                  <th style="width: 20%">
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($scores as $score)
                    <tr>
                      <td>{{$score->id}}</td>
                      <td>{{$score->score}}</td>
                      <td>{{$score->remark}}</td>
                      <td>{{$score->created_at}}</td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-sm"  onclick="del({{$score->id}})">
                          <i class="fas fa-trash">
                          </i>
                          Delete
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">日总结</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form id="form_data" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
              <label>评分</label>
              <select name="score" class="form-control select2" style="width: 100%;">
                <option></option>
                <option value="1">一颗星</option>
                <option value="2">两颗星</option>
                <option value="3">三颗星</option>
                <option value="4">四颗星</option>
                <option value="5">五颗星</option>
              </select>
            </div>
            <div class="form-group has-feedback">
              <textarea class="form-control" rows="3" name="remark" placeholder="Enter ..."></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="Close">Close</button>
          <button type="button" class="btn btn-primary"  onclick="add()">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">删除该行？</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="form_del">
          {{ csrf_field() }}
          {{method_field('DELETE')}}
          <input type="hidden" class="form-control" id="del-id" value="0">
        </form>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="Close_del">Close</button>
          <button type="button" class="btn btn-primary" onclick="destroy()">Yes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('js')
  <!-- jQuery -->
  <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
  <!-- rating.js file -->
  <script src="{{asset('MDB/js/addons/rating.min.js')}}"></script>
  <!-- Select2 -->
  <script src="{{asset('AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
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
    function add() {
      var form_data = $('#form_data').serialize();

      $.ajax({
        url: "{{route('scores.store')}}",
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

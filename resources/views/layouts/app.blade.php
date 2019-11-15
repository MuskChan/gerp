<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>home | GERP</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('css')
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/ekko-lightbox/ekko-lightbox.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/toastr/toastr.min.css')}}">
  <style>
    @yield('style')
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layouts._navbar')

  @include('layouts._sidebar')

  @yield('content')
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="">GERP</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  @yield('js')

  <!-- Ekko Lightbox -->
  <script src="{{asset('AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
  <script src="{{asset('AdminLTE/plugins/toastr/toastr.min.js')}}"></script>
  @yield('script')
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Magazine for all topics, increasing your information about the modern wrold">
    <meta name="author" content="looleeta">

    <link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Dashborad | @yield('title')</title>
	@include('admin.layout.head')
</head>
<body>

<div id="wrapper">


    @include('admin.layout.header')

    <div id="page-wrapper">

        <div class="container-fluid">
            @yield('breadcrumb')    

            @yield('content')
        
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<!-- The Modal -->
<div id="myModal" class="modal previewModal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

@include('admin.layout.footer')
@stack('scripts')

</body>
</html>
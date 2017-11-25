<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="looleeta" content="Online Magazin v1, looleeta.com">
    <link rel="shortcut icon" href="assets/images/logo4.png" type="image/x-icon">
    <meta name="description" content="Online Magazine for all topics, increasing your information about the modern wrold">

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>
	@include('front.layout.head')
</head>
<body>


@include('front.layout.header')


@yield('content')


@include('front.layout.footer')


</body>
</html>
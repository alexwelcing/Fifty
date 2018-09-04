<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<html>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<meta name="site-url" content="{{ asset('/') }}">			
			<title>@yield('title')</title>
			
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			<link rel="shortcut icon" href="{{ asset('admin/resources/img/favicon.ico') }}" />
			<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
			<link rel="stylesheet" href="{{ asset('admin/vendor/iCheck/all.css') }}" />			
			<!-- Icons -->
			<link href="{{ asset('admin/resources/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
			<link href="{{ asset('admin/resources/icons/themify-icons/themify-icons.css') }}" rel="stylesheet">			
			<!-- Theme style -->
			<link rel="stylesheet" href="{{ asset('admin/resources/css/main-style.min.css') }}">
			<link rel="stylesheet" href="{{ asset('admin/resources/css/skins/all-skins.min.css') }}">			
			<link rel="stylesheet" href="{{ asset('admin/resources/css/demo.css') }}">			
		</head>
		<body class="skin-yellow login-page">
		@yield('content')
        
		<!-- JS scripts -->
        <script src="{{ asset('admin/vendor/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/vendor/iCheck/icheck.min.js') }}"></script>
        <script src="{{ asset('admin/resources/js/pages/jquery-icheck.js') }}"></script>
        <script src="{{ asset('admin/vendor/fastclick/fastclick.min.js') }}"></script>
        <script src="{{ asset('admin/resources/js/demo.js') }}"></script>		
	</body>	
</html>
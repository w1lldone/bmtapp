<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BMT Mobile App</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('/assets/css/material-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/assets/css/demo.css')}}" rel="stylesheet" />

     <!--  Date picker css bootstrap -->
    <link href="{{ asset('/assets/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="/css/notification.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/uploads/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/uploads/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/uploads/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/uploads/images/favicon/manifest.json">
	<link rel="mask-icon" href="/uploads/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="/uploads/images/favicon/favicon.ico">
	<meta name="msapplication-config" content="/uploads/images/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">	
    </style>
</head>

<body>

	<div class="wrapper">
	    @include('layouts.sidenav')

	    <div class="main-panel">
			
			@include('layouts.nav')

			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			@include('layouts.footer')
		</div>
	</div>
	@yield('modal')
</body>

	<!--   Core JS Files   -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	{{-- <script src="{{ asset('/assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script> --}}
	<script src="{{ asset('/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{ asset('/assets/js/material.min.js')}}" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('/assets/js/chartist.min.js')}}"></script>

	<!--  Notifications Plugin    -->
	<script src="{{ asset('/assets/js/bootstrap-notify.js')}}"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="{{ asset('/assets/js/material-dashboard.js')}}"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{ asset('/assets/js/demo.js')}}"></script>

	<!-- Datepicker JS -->
	<script src="{{ asset('/assets/js/bootstrap-datepicker.min.js')}}"></script>

	{{-- pusher library --}}
	<script src="//js.pusher.com/3.1/pusher.min.js"></script>

	<script src="{{ asset('/js/pusher.js')}}"></script>

	<script type="text/javascript">
		function loader(){
			$(".btn").hide();
			$(".spinner").show();
		}
	</script>

	@yield('script')

</html>

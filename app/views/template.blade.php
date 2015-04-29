<!DOCTYPE html>
<html lang="ES">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="{{asset('')}}">
		<title>{ Base }</title>

		<!-- Bootstrap CSS -->
		<!--
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/stylesheet.css') }}" >
		-->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

		<link rel="stylesheet" href="assets/css/bootstrap3.min.css">
	
		<!-- Custom Templates -->
	
		<style>
			.action_row
			{
				width: 70px;
			}
		</style>
		
		@yield('css')

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
				
	</head>

	<body>
		@yield('menu')
		
		<div class="container" style="margin-top:70px">
				
				@include('msg')
				{{--
				@if(App::environment('dev'))
					<span class="label label-danger">Development...</span>
				@endif
				--}}

				@yield('content')

		</div>

		
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

			@yield('js')
			
		<script type="text/javascript">

		$('document').ready(function(){

			//datepicker en forms
			$( ".datepicker").datepicker({
				dateFormat: "dd-mm-yy"
			});

			//confirm delete
			$('.del_confirm').on('click',function()
			{
				if (!confirm("Desea eliminar este registro?"))
                {
                 return false;
                }
			});
		});
			
		</script>


	</body>
</html>
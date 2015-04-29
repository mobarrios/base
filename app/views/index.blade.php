@extends('template')

	@section('menu')
		@include('menu')
	@endsection

	@section('content')
		
		<div class="jumbotron" >	
			<div class="row">
		  		<div class="col-xs-4">
		  			<div class="thumbnail">
		  				<img src="assets/images/{{$master->logo}}" alt="">
		  			</div>
		  			<h2 class="text-center">{{$master->name}}</h2>
		 		 </div>
		 	</div>
		</div>
		

	@endsection

@stop
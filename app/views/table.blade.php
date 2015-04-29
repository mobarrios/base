@extends('template')

	@section('css')
			
			
	@endsection
	
	@section('content')

	<div id="table">

	</div>

	@endsection

	@section('js')


	<script>
		$(document).ready(function(){

					$.ajax({
							url : 'ajax',
							dataType: 'json',
							}).done(function (data) {
								$('#table').html(data);
								console.log(data);
								
							}).fail(function () {
								alert('Posts could not be loaded.');
					});
			});
	</script>

	@endsection
@stop
@extends('template')
	@section('menu')
		@include('menu')
	@endsection

	@section('content')

		<div class="panel panel-default">
			  <div class="panel-heading">
					<h3 class="panel-title">{{$modulo}} : {{$seccion}}</h3>
			  </div>
			  <div class="panel-body">				
				<div class="row">
					{{Form::open(array('url'=> 'buscar'))}}
						<div class="col-xs-3">
							<div class="input-group input-group-sm">
								<input type='hidden' name='model' value='{{$ruta}}'>
								<input type="text" class="form-control" placeholder="Buscar" name="buscar">
								<span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>	
							</div>
						</div>
					{{Form::close()}}
					
						@yield('extra')

					<div class="col-xs-2 pull-right text-center">
						
						@if(Roles::validate($modules_id,'add'))
							<a aria-label="Left Align" href="{{route($ruta.'_new_form')}}" class="btn  btn-warning btn-sm" data-toggle=	"modal" data-target="#myModal" data-backdrop="false"> <span class="fa fa-plus" aria-hidden="true"></span> agregar
							</a>
						@endif

					</div>
				</div>
				<hr>
				@include($ruta.'/'.$ruta.'_list')
			  </div>
		</div>

		<!--- MODAL -->
		<div id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Content will be loaded here from "remote.php" file -->
				</div>
			</div>
		</div>
		<!-- END MODAL -->

		
	@endsection

	@section('js')
		<script type="text/javascript">

			$('body').on('hidden.bs.modal', '.modal', function () {
				$(this).removeData('bs.modal');
			});
		</script>
	@endsection
@stop
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">{{$modulo}} : {{$seccion}}</h4>
	</div>

	<div class="modal-body">
		@if(isset($model_edit))

			{{Form::model($model_edit,  array('route' => array($ruta.'_post_edit', $model_edit->id) , 'enctype' => 'multipart/form-data','id'=>'form'))  }}
		@else
			{{Form::open(array('route'=> ($ruta.'_post_new') ,'class'=>'form-horizontal', 'enctype' => 'multipart/form-data','id'=>'form'))}}
		@endif

			@include($ruta.'/'.$modal.'_form')
			
		<hr>
		
			{{Form::submit('Guardar',array('class'=>'btn btn-primary'))}}	
		
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	</div>

	
	{{Form::close()}}
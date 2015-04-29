<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Perfil</th>
				<th>Permisos</th>
				<th class="action_row"></th>
			</tr>
		</thead>
		<tbody>
			
				@foreach($model  as $models)
				<tr>
					<td>{{$models->id}}</td>
					<td>{{$models->profile}}</td>
					<td>
						<a href="{{route('permissions' ,$models->id)}}" class="btn btn-xs btn-warning"><i class="fa fa-check"></i></a>
					</td>
					<td>
						<div class="btn-group btn-group-xs">
						@if(Roles::validate($modules_id,'edit'))
							<a href="{{route($ruta.'_edit_form',$models->id)}}" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></a>
						@endif
						@if(Roles::validate($modules_id,'delete'))
							<a href="{{route($ruta.'_delete',$models->id)}}"type="button" class="del_confirm btn btn-danger"><i class="fa fa-remove"></i></a>
						@endif
						</div>
					</td>
				</tr>
				@endforeach

		</tbody>
	</table>

	<ul class="pagination">
		{{ $model->links() }}
	</ul>

</div>
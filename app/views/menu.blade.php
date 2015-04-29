<nav class="navbar navbar-default navbar-fixed-top">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Nav.</span>
				<span class="fa fa-bars"></span>
			</button>
			<a href="inicio" class="navbar-brand"> { Base } </a>
		</div>

		
			

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>  Menu</a>
					<ul class="dropdown-menu">

					@foreach(Menus::all() as $menu)

						@if($menu->Modules->available == 1)

							<?php $action = $menu->action ?>

							@if($menu->main == 0)

								@if($menu->routes == "")		
									@if($menu->Modules->PermissionsProfiles(Auth::User()->profiles_id)->first()->read == 1)
										<li role="presentation" class="dropdown-header">{{$menu->name}}</li>
									@endif
								@else
									@if($menu->Modules->PermissionsProfiles(Auth::User()->profiles_id)->first()->$action == 1)
										<li role="presentation" ><a href="{{route($menu->routes)}}">{{$menu->name}}</a></li>
									@endif
								@endif

							@else
								@if($menu->Modules->PermissionsProfiles(Auth::User()->profiles_id)->first()->$action == 1)
									<li><a href="{{route($menu->routes)}}">{{$menu->name}}</a></li>
								@endif
							@endif
						@endif
					@endforeach							


					</ul>
				</li>
			</ul>
		
							
					
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name}} </a>
					<ul class="dropdown-menu">
						<li><a href="">Perfil</a></li>
					</ul>
				</li>

				@if(Auth::User()->profiles_id == 1)
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
						<ul class="dropdown-menu">
							<li><a href="{{route('users')}}">Usuarios</a></li>
							<li><a href="{{route('profiles')}}">Perfiles</a></li>
							<li><a href="update">Update <span class="badge">1</span> </a></li>
						</ul>
					</li>
				@endif

				<li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i></a>
				</li>

			</ul>
		</div>
	</div><!-- /.navbar-collapse -->
</nav>
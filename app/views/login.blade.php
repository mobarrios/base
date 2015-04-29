@extends('template')

	@section('content')

<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-xs-4 col-xs-offset-4 ">   
      <div class="text-center">
        <h1>
         <img src="{{ URL::asset('assets/images/nav_stock_logo_little.png') }}" >
        </h1>        
      </div> 
        <div class="panel panel-default " >
            {{--
            {{App::environment()}}
            <h1>{{Session::get('company')}}</h1>
            --}}
    
            <div style="padding-top:30px" class="panel-body" >    
                {{Form::open(array('route'=>'post_login','class'=>'form-horizontal'))}}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="usuario" required="required">                                        
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required="required">
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <div class="col-xs-12 ">
                            <button type="submit" class="btn btn-md btn-warning" style="width:100% ">Iniciar Sesión </button>
                        </div>
                    </div>
                    <hr>
                    <div class="col-xs-6 text-center">
                        <input name="remember" type="checkbox"> Recordarme
                    </div>
                    <div class="col-xs-6 text-center">
                        <small class="btn-link">Olvide mi contraseña</small>
                    </div>
                {{Form::close()}}
            </div>               
        </div> 
    </div>
</div>
    
	@endsection

@stop
@extends('layouts.app')

@section('content')
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
         <div class="panel panel-info" style="background-color: #f0f0f0;">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f0f0f0;">
                        <div class="panel-title" style="color: #000;">Sign In</div>
                                        </div> 
                <div style="padding-top:30px" class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          
                            <div class="col-md-6">
                             <div style="" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="email" class="form-control" name="email" placeholder="Email" style="width:250px;height:40px;" value="{{ old('email') }}">
                             </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        
                            <div class="col-md-6">
                            <div style="" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Password" style="width:250px;height:40px;">
                            </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            
                                <div class="checkbox col-sm-12 controls">
                                    <label style="color: #000;">
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                        
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                                <button class="btn btn-default">Cancel</button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

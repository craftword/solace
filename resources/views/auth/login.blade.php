@extends('layouts.auth')

<<<<<<< HEAD
<style>
   body{
	background-image: url('../images/steth.jpg');
	height:100vh;
	background-repeat: no-repeat;
	background-size:cover;
	background-position: center;
}
</style>

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Moye Specialist Hospital(Login Here)</div>
=======
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucfirst(config('app.name')) }} Login</div>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                <div class="panel-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
<<<<<<< HEAD
                            <label class="col-md-3 control-label">Username</label>

                            <div class="col-md-8">
=======
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <input type="text"
                                       class="form-control"
                                       name="username"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label class="col-md-3 control-label">Password</label>

                            <div class="col-md-8">
=======
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
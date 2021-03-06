@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ucfirst($_GET['type'])}} Register</div>




                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            @if($errors->has('age'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('age') }}
                                </div>

                            @endif
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if(isset($_GET['type']) && $_GET['type'] == 'patient')

                                <div class="form-group">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="col-md-6">
                                        <select name="gender" class="form-control" required>
                                            <option value="">-- select --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="age" class="col-md-4 control-label">Age</label>

                                    <div class="col-md-6">
                                        <input id="age" type="number" class="form-control" name="age" value="{{ old('age') }}" required>

                                    </div>
                                </div>

                            @endif

                            <input type="hidden" name="user_type" value="{{$_GET['type']}}">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>

                                </div>
                            </div>
                        </form>

                        <p>Already have an account? <a href="{{url('login')}}">Login</a>
                            @if(isset($_GET['type']) && $_GET['type'] == 'patient')
                                <a style="float: right" href="{{url('login/google')}}"><img src="{{url('/images/g-bt.png')}}" style="height: 40px"></a></p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

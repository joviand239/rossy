@extends('cms.layouts.guest')

@section('content')
    <div class="app app-default">

        <div class="app-container app-login">
            <div class="flex-center">
                <div class="app-header"></div>
                <div class="app-body">
                    <div class="loader-container text-center">
                        <div class="icon">
                            <div class="sk-folding-cube">
                                <div class="sk-cube1 sk-cube"></div>
                                <div class="sk-cube2 sk-cube"></div>
                                <div class="sk-cube4 sk-cube"></div>
                                <div class="sk-cube3 sk-cube"></div>
                            </div>
                        </div>
                        <div class="title">Logging in...</div>
                    </div>
                    <div class="app-block">
                        <div class="app-form">
                            <div class="form-header">
                                <div class="app-brand text-center">
                                    <img src="{{ url('/') }}/assets/image/logo-login.png"/><br/><br/>
                                    <span class="highlight">Wakaf Hasanah Admin</span>
                                </div>
                            </div>

                            @if(count($errors->all())>0)
                                <div class="row" id="alert-box">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert" id="alert-box-details">
	                                        @foreach($errors->all() as $error)
                                            {{ $error }}<br/>
	                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ url('/admin/password/reset') }}">
	                            {{ csrf_field() }}
	                            <input type="hidden" name="token" value="{{ $token }}">
	                            <input type="hidden" name="email" value="{{ Input::get('email') }}">

                                <div class="input-group">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="New Password">
                                </div>

                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
                                </div>

                                <div class="text-center">
                                    <input type="submit" class="btn btn-success btn-submit" value="Confirm Reset Password"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="app-footer">
                </div>
            </div>
        </div>

    </div>


@endsection

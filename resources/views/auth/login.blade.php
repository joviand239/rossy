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
                                    <img class="logo-login" src="{{ url('/') }}/assets/admin/image/logo-new.png"/><br/><br/>
                                </div>
                            </div>

                            @if($errors->has('email'))
                            <div class="row" id="alert-box">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert" id="alert-box-details">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            </div>
                            @endif

                            <form action="{{ url('/admin/login') }}" method="POST">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group" style="margin-bottom: 0px;">
                                    <span class="input-group-addon" id="basic-addon2">
                                        <i class="fa fa-key" aria-hidden="true"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/admin/password/reset') }}" style="font-size:12px;">forgot password</a>
                                </div>
                                <br/><br/>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-success btn-submit" value="Login"/>
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

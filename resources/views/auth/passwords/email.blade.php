@extends('cms.layouts.guest')

<!-- Main Content -->
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
                                    <span class="highlight">Password Reset</span>
                                </div>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if($errors->has('email'))
                                <div class="row" id="alert-box">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert" id="alert-box-details">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">

                                @if (!session('status'))
                                    <div class="input-group" style="margin-bottom: 0px;">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                    </div>
                                    <br/>

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-success btn-submit" value="Send Password Reset Link"/>
                                    </div>
                                @endif
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

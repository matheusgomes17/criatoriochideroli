@extends('frontend.layouts.app')

@section('content')

    <section id="page-title">
        <div class="container clearfix">
            <h1>Registrar nova conta</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Registrar</li>
            </ol>
        </div>
    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Faça login na sua conta</div>

                    <div class="acc_content clearfix">

                        {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'nobottommargin']) }}
                        <div class="col_full">
                            <label for="email">E-mail:</label>
                            <input type="email" name="email" autofocus="autofocus" required="required" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" required="required" class="form-control" />
                        </div>

                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-black nomargin" name="login-form-submit">Entrar</button>

                            <label style="padding-left: 20px">
                                <input name="remember" type="checkbox" value="1"> Lembrar-me
                            </label>

                            <a href="{{ route('frontend.auth.password.reset') }}" class="fright">Esqueceu Sua Senha?</a>
                            <a href="{{ route('frontend.auth.register') }}" class="fright">Cadastrar uma nova conta</a>
                        </div>
                        {{ Form::close() }}

                        <div class="line line-sm"></div>

                        <div class="center">
                            <h4 style="margin-bottom: 15px;">ou entre com:</h4>
                            <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                            <span class="hidden-xs">ou</span>
                            <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- #content end -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="panel panel-default">

                <div class="panel-heading">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>

                <div class="panel-body">

                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <p class="form-control-static">{{ $email }}</p>
                                {{ Form::hidden('email', $email, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                            </div><!--col-md-6-->
                        </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        {{ Form::label('password_confirmation', trans('validation.attributes.frontend.password_confirmation'), ['class' => 'col-md-4 control-label']) }}
                        <div class="col-md-6">
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.password_confirmation')]) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'btn btn-primary']) }}
                        </div><!--col-md-6-->
                    </div><!--form-group-->

                    {{ Form::close() }}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection

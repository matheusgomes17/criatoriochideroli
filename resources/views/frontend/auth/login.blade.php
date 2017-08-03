@extends('frontend.layouts.app')

@section('content')
    <section>
        <div id="page-title">
            <div class="container clearfix">
                <h1>Entrar na conta</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('frontend.index') }}">Início</a></li>
                    <li class="active">Entrar</li>
                </ol>
            </div>
        </div><!-- #page-title end -->

        <div id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                        <div class="acctitle"><i class="icon-lock3"></i>
                            Faça login na sua conta</div>

                        <div class="acc_content clearfix">

                            {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'nobottommargin']) }}
                                <div class="col_full">
                                    <label for="email">E-mail:</label>
                                    <input type="email" id="email" name="email" autofocus="autofocus" required="required" class="form-control" />
                                </div>

                                <div class="col_full">
                                    <label for="password">Senha:</label>
                                    <input type="password" id="password" name="password" required="required" class="form-control" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" name="login-form-submit">Entrar</button>

                                        <label for="remember" style="padding-left: 20px">
                                            <input id="remember" name="remember" type="checkbox" value="1"> Lembrar-me
                                        </label>

                                    <a href="{{ route('frontend.auth.password.reset') }}" class="fright">Esqueceu Sua Senha?</a>
                                    <a href="{{ route('frontend.auth.register') }}" class="fright">Cadastrar uma nova conta</a>
                                </div>
                            {{ Form::close() }}

                            <div class="line line-sm"></div>

                            <div class="center">
                                <p style="margin-bottom: 15px; font-size: 1.3em;">ou entre com:</p>
                                <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                                <span class="hidden-xs">ou</span>
                                <a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #content end -->
    </section>
@endsection
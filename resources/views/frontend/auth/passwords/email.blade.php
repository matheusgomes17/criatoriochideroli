@extends('frontend.layouts.app')

@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>Recuperar a senha</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Recuperar Senha</li>
            </ol>
        </div>
    </section><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

                    <div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>
                        Esqueceu sua senha?</div>

                    <div class="acc_content clearfix">
                        {{ Form::open(['route' => 'frontend.auth.password.email.post', 'class' => 'nobottommargin']) }}

                        <div class="col_full">
                            <label for="email">Endereço de E-mail:</label>
                            <input type="email" name="email" placeholder="" maxlength="191" required="required" autofocus="autofocus" class="form-control" />
                        </div>

                        <div class="col_full nobottommargin">
                            <button type="submit" class="button button-3d nomargin">Entrar</button>

                            <a href="{{ route('frontend.auth.login') }}" class="fright">Se Lembrou da Senha?</a>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #content end -->
@endsection
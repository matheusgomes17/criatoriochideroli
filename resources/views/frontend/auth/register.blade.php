@extends('frontend.layouts.app')

@section('content')
<section>
    <div id="page-title">
        <div class="container clearfix">
            <h1>Registrar nova conta</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Registrar</li>
            </ol>
        </div>
    </div><!-- #page-title end -->

    <div id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                    <div class="acctitle"><i class="icon-user4"></i>
                        Nova inscrição? Registre-se para uma conta</div>
                    <div class="acc_content clearfix">
                        {{ Form::open(['route' => 'frontend.auth.register.post', 'class' => 'nobottommargin']) }}
                            <div class="col_full">
                                <label for="first_name">Primeiro Nome:</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Digite o seu primeiro nome" maxlength="191" required="required" autofocus="autofocus" class="form-control" />
                            </div>

                            <div class="col_full">
                                <label for="last_name">Segundo Nome:</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Digite o seu segundo nome" maxlength="191" required="required" class="form-control" />
                            </div>

                            <div class="col_full">
                                <label for="email">Endereço de E-mail:</label>
                                <input type="email" id="email" name="email" placeholder="Digite um e-mail válido" maxlength="191" required="required" class="form-control" />
                            </div>

                            <div class="col_one_third">
                                <label for="ddd">DDD:</label>
                                <input type="text" id="ddd" name="ddd" placeholder="(DDD)" maxlength="2" required="required" class="form-control" data-mask="00" />
                            </div>

                            <div class="col_two_third col_last">
                                <label for="phone">Telefone:</label>
                                <input type="text" id="phone" name="phone" placeholder="Digite seu telefone fixo ou celular" maxlength="9" required="required" class="form-control" data-mask="000000000" />
                            </div>

                            <div class="col_full">
                                <label for="password">Senha</label>
                                <input type="password" id="password" name="password" placeholder="Escolha uma senha" required="required" class="form-control" />
                            </div>

                            <div class="col_full">
                                <label for="password_confirmation">Confirme a Senha:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Digite novamente a senha escolhida" required="required" class="form-control" />
                            </div>

                            <div class="col_full nobottommargin">
                                <button type="submit" class="button button-3d nomargin">Registrar</button>
                            </div>

                            @if (config('access.captcha.registration'))
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::captcha() !!}
                                        {{ Form::hidden('captcha_status', 'true') }}
                                    </div><!--col-md-6-->
                                </div><!--form-group-->
                            @endif
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content end -->
</section>
@endsection

@section('after-scripts')
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>

    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endsection
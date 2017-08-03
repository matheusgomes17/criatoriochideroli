<div class="row topmargin-sm clearfix">

    <section style="margin-bottom: 50px;">
        <h4>Atualizar Informações</h4>

        {{ Form::model($logged_in_user, ['route' => 'frontend.user.profile.update', 'class' => 'nobottommargin', 'method' => 'PATCH']) }}

            <div class="col_half">
                {{ Form::label('first_name', 'Primeiro Nome') }}
                {{ Form::text('first_name', null, ['class' => 'required sm-form-control', 'id' => 'first_name', 'required' => 'required', 'autofocus' => 'autofocus', 'maxlength' => '191', 'placeholder' => 'Digite o primeiro nome']) }}
            </div>

            <div class="col_half col_last">
                {{ Form::label('last_name', 'Segundo Nome') }}
                {{ Form::text('last_name', null, ['class' => 'required sm-form-control', 'id' => 'last_name', 'required' => 'required', 'maxlength' => '191', 'placeholder' => 'Digite o segundo nome']) }}
            </div>

            <div class="clear"></div>

            @if ($logged_in_user->canChangeEmail())
                <div class="col_full">
                    {{ Form::label('email', 'E-mail') }}
                    {{ Form::email('email', null, ['class' => 'required sm-form-control', 'id' => 'email', 'required' => 'required', 'maxlength' => '191', 'placeholder' => 'Digite um novo e-mail']) }}
                </div>
            @endif
            
            <div class="col_full">
                <button class="button button-3d nomargin" type="submit">Atualizar</button>
            </div>

        {{ Form::close() }}
    </section>

    <section>
        <h4>Alterar Senha</h4>

        {{ Form::open(['route' => ['frontend.auth.password.change'], 'class' => 'nobottommargin', 'method' => 'PATCH']) }}

            <div class="col_one_third">
                <label for="old_password">Senha Antiga</label>
                <input type="password" id="old_password" name="old_password" placeholder="Digite sua senha antiga" required="required" autofocus="autofocus" class="required sm-form-control" />
            </div>

            <div class="col_one_third">
                <label for="password">Nova Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite uma nova senha" required="required" class="required sm-form-control" />
            </div>

            <div class="col_one_third col_last">
                <label for="password_confirmation">Confirme Sua Nova Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Digite novamente a nova senha" required="required" class="required sm-form-control" />
            </div>

            <div class="clear"></div>

            <div class="col_full">
                <button class="button button-3d nomargin" type="submit">Atualizar</button>
            </div>

        {{ Form::close() }}
    </section>

    <section>
        <h4>Alterar Telefone</h4>

        {{ Form::model($logged_in_user, ['route' => ['frontend.auth.phone.change'], 'class' => 'nobottommargin', 'method' => 'PATCH']) }}

            <div class="col_one_third">
                {{ Form::label('ddd', 'DDD') }}
                {{ Form::text('ddd', null, ['class' => 'required sm-form-control', 'id' => 'ddd', 'required' => 'required', 'maxlength' => '2', 'placeholder' => 'Digite o primeiro nome', 'data-mask' => '00']) }}
            </div>

            <div class="col_two_third col_last">
                {{ Form::label('phone', 'Telefone') }}
                {{ Form::text('phone', null, ['class' => 'required sm-form-control', 'id' => 'phone', 'required' => 'required', 'maxlength' => '9', 'placeholder' => 'Digite o primeiro nome', 'data-mask' => '000000000']) }}
            </div>

            <div class="clear"></div>

            <div class="col_full">
                <button class="button button-3d nomargin" type="submit">Atualizar</button>
            </div>

        {{ Form::close() }}
    </section>
</div>

@section('after-scripts')
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
@endsection
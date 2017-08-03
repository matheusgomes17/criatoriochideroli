<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Exception Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used in Exceptions thrown throughout the system.
      | Regardless where it is placed, a button can be listed here so it is easily
      | found in a intuitive way.
      |
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists'    => 'Esse papel já existe. Por favor, escolha um nome diferente.',
                'cant_delete_admin' => 'Você não pode excluir o papel de Administrador.',
                'create_error'      => 'Houve um problema ao criar esse papel. Por favor, tente novamente.',
                'delete_error'      => 'Houve um problema ao excluir esse papel. Por favor, tente novamente.',
                'has_users'         => 'Você não pode excluir um papel com usuários associados..',
                'needs_permission'  => 'Você deve selecionar pelo menos uma permissão para este papel.',
                'not_found'         => 'Este papel não existe.',
                'update_error'      => 'Houve um problema ao atualizar esse papel. Por favor, tente novamente.',
            ],
            'users' => [
                'cant_deactivate_self'  => 'Você não pode fazer isso com você mesmo.',
                'cant_delete_admin'     => 'Você não pode excluir o superadministrador.',
                'cant_delete_self'      => 'Você não pode se excluir.',
                'cant_delete_own_session' => 'Você não pode excluir sua própria sessão.',
                'cant_restore'          => 'Este usuário não está excluído para que ele possa ser restaurado.',
                'create_error'          => 'Houve um problema ao criar esse usuário. Por favor, tente novamente.',
                'delete_error'          => 'Houve um problema ao excluir esse usuário. Por favor, tente novamente.',
                'delete_first'          => 'Este usuário deve ser excluído antes que possa ser destruído permanentemente.',
                'email_error'           => 'Esse endereço de e-mail pertence a um usuário diferente.',
                'mark_error'            => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente',
                'not_found'             => 'Esse usuário não existe.',
                'restore_error'         => 'Houve um problema ao restaurar esse usuário. Por favor, tente novamente.',
                'role_needed_create'    => 'Você deve escolher pelo menos uma função.',
                'role_needed'           => 'Você deve escolher pelo menos uma função.',
                'session_wrong_driver'  => 'Seu driver de sessão deve estar configurado para o banco de dados para usar esse recurso.',
                'update_error'          => 'Houve um problema ao atualizar esse usuário. Por favor, tente novamente.',
                'update_password_error' => 'Houve um problema ao alterar a senha do usuário. Por favor, tente novamente.',
            ],
        ],
        'catalog' => [
            'categories' => [
                'main'              => 'Categoria Principal',
                'create_error'      => 'Houve um problema ao criar essa categoria. Por favor, tente novamente.',
                'delete_error'      => 'Houve um problema ao excluir essa categoria. Por favor, tente novamente.',
                'delete_first'      => 'This user must be deleted first before it can be destroyed permanently.',
                'update_error'      => 'Houve um problema ao atualizar essa categoria. Por favor, tente novamente.',
                'not_found'         => 'Esta categoria não existe.',
            ],
            'products' => [
                'create_error'      => 'Houve um problema ao criar esse produto. Por favor, tente novamente.',
                'update_error'      => 'Houve um problema ao atualizar este produto. Por favor, tente novamente.',
                'delete_error'      => 'Houve um problema ao excluir este produto. Por favor, tente novamente.',
                'delete_first'      => 'This user must be deleted first before it can be destroyed permanently.',
                'belongs_user'      => 'Este produto não pertence ao seu usuário!',
                'category_info'     => 'Não existem categorias cadastradas.',
                'category_error'    => 'O produto deve ter uma categoria para ser cadastrado.',
            ],
            'budgets' => [
                'create_error'      => 'Houve um problema ao criar esse orçamento. Por favor, tente novamente.',
                'update_error'      => 'Houve um problema ao atualizar esse orçamento. Por favor, tente novamente.',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Sua conta já está confirmada.',
                'confirm'           => 'Confirme sua conta!',
                'created_confirm'   => 'Sua conta foi criada com sucesso. Enviamos um e-mail para você confirmar a sua conta.',
                'mismatch'          => 'Seu código de confirmação não corresponde.',
                'not_found'         => 'Esse código de confirmação não existe.',
                'resend'            => 'Sua conta não está confirmada. Por favor, clique no link de confirmação em seu e-mail, ou <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">clique aqui</a> para reenviar o e-mail de confirmação.',
                'success'           => 'Sua conta foi confirmada com sucesso!',
                'resent'            => 'Um novo e-mail de confirmação foi enviado para você.',
            ],
            'deactivated' => 'Sua conta foi desativada.',
            'email_taken' => 'Esse endereço de e-mail já foi utilizado.',
            'password'    => [
                'change_mismatch' => 'Essa não é a sua senha antiga.',
                'reset_problem' => 'Ocorreu um problema ao restaurar sua senha. Reenvie o email de redefinição de senha.',
            ],

            'registration_disabled' => 'Atualmente o registro está fechado.',
        ],
    ],
];

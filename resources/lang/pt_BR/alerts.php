<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    |--------------------------------------------------------------------------
    */

    'backend' => [
        'roles' => [
            'created' => 'O papel foi criado com sucesso.',
            'updated' => 'O papel foi atualizado com sucesso.',
            'deleted' => 'O papel foi excluído com sucesso.',
        ],

        'users' => [
            'confirmation_email'  => 'Uma nova confirmação de e-mail será enviada.',
            'created'             => 'O usuário foi criado com sucesso.',
            'deleted'             => 'O usuário foi excluído com sucesso.',
            'deleted_permanently' => 'O usuário foi excluído permanentemente.',
            'restored'            => 'O usuário foi restaurado com sucesso.',
            'session_cleared'     => "The user's session was successfully cleared.",
            'updated'             => 'O usuário foi atualizado com sucesso.',
            'updated_password'    => 'A senha do usuário foi atualizada com sucesso.',
        ],

        'products' => [
            'created'             => 'O produto foi criado com sucesso.',
            'deleted'             => 'O produto foi excluído com sucesso.',
            'deleted_permanently' => 'O produto foi excluído permanentemente.',
            'restored'            => 'O produto foi restaurado com sucesso.',
            'updated'             => 'O produto foi atualizado com sucesso.',
        ],

        'categories' => [
            'created'             => 'A categoria foi criada com sucesso.',
            'deleted'             => 'A categoria foi excluída com sucesso.',
            'deleted_permanently' => 'A categoria foi excluída permanentemente.',
            'restored'            => 'A categoria foi restaurada com sucesso.',
            'updated'             => 'A categoria foi atualizada com sucesso.',
        ],

        'orders' => [
            'answers' => [
                'responded' => 'O orçamento foi respondido com sucesso.',
            ],
        ],

        'contacts' => [
            'answers' => [
                'responded' => 'O contato foi respondido com sucesso.',
            ],
        ],

        'galleries' => [
            'created'             => 'A imagem foi criada com sucesso.',
            'deleted'             => 'A imagem foi excluída com sucesso.',
            'updated'             => 'A imagem foi atualizada com sucesso.',
        ],
    ],
    'frontend' => [
        'contacts' => [
            'send' => 'Você enviou um e-mail com sucesso! Em breve entraremos em contato.',
        ],
        'orders' => [
            'pending' => 'Para fazer um novo orçamento é necessário aguardar até que seu último orçamento seja respondido.',
            'success' => "Seu orçamento foi gerado com sucesso! Aguarde até que nossos administradores respondam seu orçamento.",
            'user_error' => 'Você não pode acessar um orçamento de outro usuário!',
        ],
    ]
];

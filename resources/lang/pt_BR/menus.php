<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Menus Language Lines
      |--------------------------------------------------------------------------
      |
      | The following language lines are used in menu items throughout the system.
      | Regardless where it is placed, a menu item can be listed here so it is easily
      | found in a intuitive way.
      |
      |--------------------------------------------------------------------------
     */

    'backend' => [
        'access' => [
            'title' => 'Gerenciamento de Usuários',
            'roles' => [
                'all'        => 'Todos os Papéis',
                'create'     => 'Criar Papel',
                'edit'       => 'Editar Papel',
                'management' => 'Gerenciamento de Papéis',
                'main'       => 'Papéis',
            ],
            'users' => [
                'all'             => 'Todos os Usuários',
                'change-password' => 'Alterar Senha',
                'create'          => 'Criar Usuário',
                'deactivated'     => 'Desativar Usuários',
                'deleted'         => 'Excluir Usuários',
                'edit'            => 'Editar Usuário',
                'main'            => 'Usuários',
                'view'            => 'Visualizar Usuário',
            ],
        ],
        'catalog' => [
            'title' => 'Gerenciamento de Produtos',
            'categories' => [
                'all'        => 'Todas as Categorias',
                'create'     => 'Criar Categoria',
                'deleted'    => 'Excluir Categoria',
                'edit'       => 'Editar Categoria',
                'management' => 'Gerenciamento de Categorias',
                'main'       => 'Categorias',
            ],
            'products' => [
                'all'         => 'Todos os Produtos',
                'create'      => 'Criar Produto',
                'deactivated' => 'Desativar Produtos',
                'deleted'     => 'Excluir Produtos',
                'edit'        => 'Editar Produto',
                'management'  => 'Gerenciamento de Produtos',
                'main'        => 'Produtos',
            ],
            'orders' => [
                'pending'     => 'Orçamentos Pendentes',
                'answered'    => 'Orçamentos Respondidos',
                'management'  => 'Gerenciamento de Orçamentos',
                'main'        => 'Orçamentos',
            ],
        ],
        'blog' => [
            'title' => 'Gerenciamento de Postagens',
            'posts' => [
                'all'         => 'Todos as Postagens',
                'create'      => 'Criar Postagem',
                'deleted'     => 'Excluir Postagem',
                'edit'        => 'Editar Postagem',
                'management'  => 'Gerenciamento de Postagens',
                'main'        => 'Postagens',
            ],
        ],
        'system' => [
            'title' => 'Gerenciamento de Contatos',
            'contacts' => [
                'pending'     => 'Contatos Pendentes',
                'answered'    => 'Contatos Respondidos',
                'management'  => 'Gerenciamento de Contatos',
                'main'        => 'Contatos',
            ],
            'galleries' => [
                'all'     => 'Todas as Galeria',
                'create'    => 'Criar Galeria',
                'management'  => 'Gerenciamento de Galerias',
                'main'        => 'Galerias',
            ],
        ],
        'log-viewer' => [
            'main'      => 'Visualizador de Log',
            'dashboard' => 'Painel de Controle',
            'logs'      => 'Logs',
        ],
        'sidebar' => [
            'dashboard' => 'Painel de Controle',
            'general'   => 'Geral',
            'system'    => 'Sistema',
        ],
    ],
    'language-picker' => [
        'language' => 'Idioma',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'العربية (Arabic)',
            'zh'    => '(Chinese Simplified)',
            'zh-TW' => '(Chinese Traditional)',
            'da'    => 'Dinamarquês (Danish)',
            'de'    => 'Alemão (German)',
            'el'    => '(Greek)',
            'en'    => 'Inglês (English)',
            'es'    => 'Espanhol (Spanish)',
            'fr'    => 'Francês (French)',
            'id'    => 'indonésio (Indonesian)',
            'it'    => 'Italiano (Italian)',
            'ja'    => '(Japanese)',
            'nl'    => 'Holandês (Dutch)',
            'pt_BR' => 'Português do Brasil (Brazilian Portuguese)',
            'ru'    => 'Russo (Russian)',
            'sv'    => 'Sueco (Swedish)',
            'th'    => '(Thai)',
        ],
    ],
];

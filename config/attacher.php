<?php

# config/attacher.php
return [

    'model'        => 'Artesaos\Attacher\AttacherModel', # You can customize the model for your needs.
    'base_url'     => '', # The url basis for the representation of images.
    'path'         => '/uploads/images/:style/:filename', # Change the path where the images are stored.

    'style_guides' => [
        'default' => [
            'cover' => function ($image) {
                $image->resize(440, 586);
                return $image;
            },
            'thumb' => function ($image) {
                $image->resize(100, 75);
                return $image;
            },
        ],
        'blog' => [
            'post' => function ($image) {
                $image->resize(400, 300);
                return $image;
            },
        ],
    ],
];

<?php
# config/attacher.php

return [
    'model'        => 'Artesaos\Attacher\AttacherModel', # You can customize the model for your needs.
    'base_url'     => '', # The url basis for the representation of images.
    'path'         => '/uploads/images/:style/:filename', # Change the path where the images are stored.

    # Where the magic happens.
    # This is where you record what the "styles" that will apply to your image.
    # Each style takes as the parameter is one \Intervention\Image\Image
    # See more in http://image.intervention.io/
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
    ],
];

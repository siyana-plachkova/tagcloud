<?php

return array(
    'imagga' => array(
        'key' => $_ENV['IMAGGA_API_KEY'],
        'secret' => $_ENV['IMAGGA_API_SECRET'],
        'auth' => $_ENV['IMAGGA_AUTH_HEADER'],
        'endpoint' => 'https://api.imagga.com/v1',
        'tagging_endpoint' => '/tagging',
    ),
    'instagram' => array(
        'key' => $_ENV['INSTAGRAM_API_KEY'],
        'secret' => $_ENV['INSTAGRAM_API_SECRET'],
    ),
);
<?php

return [
    'modules' => [
        'ucp' => [
            'class' => 'lo\modules\ucp\Module',
            'defaultRoute' => 'favorites/index'
        ],
    ],

    'components'=>[
        'urlManager'=>[
            'rules'=>[
                'ucp/favorites/<slug:[\w\-]+>' => 'ucp/favorites/view',
            ]
        ]
    ]

];
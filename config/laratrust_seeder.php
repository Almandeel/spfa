<?php

return [


    'role_structure' => [

        // 'superadministrator' => [
        //     'user' => 'c,r,u,d',
        //     'acl' => 'c,r,u,d',
        //     'profile' => 'r,u'
        // ],

        // 'administrator' => [
        //     'user' => 'c,r,u,d',
        //     'profile' => 'r,u'
        // ],

        // 'user' => [
        //     'profile' => 'r,u'
        // ],

    ],
    'permission_structure' => [
        'super' => [
            'news'              => 'c,r,u,d', //Done
            'courses'           => 'c,r,u,d', //Done
            'sliders'           => 'c,r,u,d', //Done
            'informations'      => 'c,r,u,d', //Done
            'networks'          => 'c,r,u,d', //Done
            'studio'            => 'c,r,u,d', //Done
            'permissions'       => 'c,r,u,d', //Done
            'roles'             => 'c,r,u,d', //Done
            'settings'          => 'c,r,u,d', //Done
            'users'             => 'c,r,u,d', //Done
            'teachers'          => 'c,r,u,d', //Done
            'categories'        => 'c,r,u,d', //Done
            'dashboard'         => 'r',       //Done
        ],
    ],


    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

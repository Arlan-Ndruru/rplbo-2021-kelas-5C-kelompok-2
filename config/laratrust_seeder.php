<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'files' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'kepalaSekolah' => [
            'users' => 'c,r,u,d',
            'files' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'kepalaTU' => [
            'users' => 'c,r,u,d',
            'files' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'stafTU' => [
            'users' => 'c,r,u,d',
            'files' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'receptionist' => [
            'users' => 'c,r,u,d',
            'files' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'users' => 'r,u',
            'files' => 'r',
            'profile' => 'r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

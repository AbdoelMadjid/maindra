<?php

return [
    'IDENTITAS PENGGUNA' => [
        'title_en' => 'USER IDENTITY',
        'title_key' => 'idp_identitaspengguna',
        'default_permissions' => ['read'],
        'default_roles' => ['kepsek', 'guru', 'tatausaha', 'siswa'],
        'menus' => [
            [
                'title' => 'Profil Pengguna',
                'title_en' => 'User Profile',
                'title_key' => 'idp_profil_pengguna',
                'route' => 'profil-pengguna',
                'icon' => 'ki-duotone ki-profile-circle fs-2',
                'paths' => 3,
                'permissions' => ['read', 'update'],
                'roles' => ['kepsek', 'guru', 'tatausaha', 'siswa'],
            ],
            [
                'title' => 'Kata Sandi',
                'title_en' => 'Password',
                'title_key' => 'idp_kata_sandi',
                'route' => 'password-pengguna',
                'icon' => 'ki-duotone ki-key fs-2',
                'paths' => 2,
                'permissions' => ['read', 'update'],
                'roles' => ['kepsek', 'guru', 'tatausaha', 'siswa'],
            ],
        ],
    ],
];

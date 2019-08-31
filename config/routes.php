<?php
return [
    'chord' => 'chord/index',
    'chdate' => 'chdate/index',
    'regist' => 'regist/registr', // actionIndex в RegistController
    'singin' => 'regist/login', // actionIndex в SinginController
    'admin'                   => 'admin/index',
    'order'                   => 'order/index',
    'error'                   => 'error/index',
    'spasibo'                 => 'spasibo/index',
    '([0-9a-z]+).([0-9a-z]+)' => 'index/index',
    '([0-9a-z]+)'             => 'index/index',
    ''                        => 'index/index',
];



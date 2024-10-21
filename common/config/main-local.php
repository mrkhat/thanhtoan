<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=bvdn',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
     'db3' =>   [
            'class' => 'yii\db\Connection',
            'driverName' => 'sqlsrv',
            'dsn' => 'sqlsrv:Server=10.84.21.222\MSSQLSERVER17;Database=test',
            'username' => 'sa',
            'password' => 'cntt@1234554321',
            'charset' => 'utf8',
        ],
         'db2' =>   [
            'class' => 'yii\db\Connection',
            'driverName' => 'sqlsrv',
            'dsn' => 'sqlsrv:Server=10.84.2.8\SQLDB;Database=eHospital_DongNai_A',
            'username' => 'thoai',
            'password' => 'abcd@1234',
            'charset' => 'utf8',
        ],
        'db4' =>   [
            'class' => 'yii\db\Connection',
            'driverName' => 'sqlsrv',
            'dsn' => 'sqlsrv:Server=10.84.3.102;Database=test',
            'username' => 'thoai',
            'password' => 'Cntt@123',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];

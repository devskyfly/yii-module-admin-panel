<?php
$components = require __DIR__ . '/componets/config.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [],
    'controllerNamespace' => 'app\console',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@app' => dirname(__DIR__),
        '@frontend' => dirname(__DIR__),
    ],
    'components' => array_merge($components),
];

return $config;

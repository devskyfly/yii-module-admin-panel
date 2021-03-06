<?php

$components = require __DIR__ . '/componets/config.php';
$modules = require __DIR__ . '/modules/config.php';
/**
 * Application configuration shared by all test types
 */
return [
    'id' => 'functional-tests',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@webroot' => dirname(__DIR__).'/web',
        '@webroot/assets' => dirname(__DIR__).'/web/assets',
        '@web' => '/',
        '@app' => dirname(__DIR__),
        '@frontend' => dirname(__DIR__),
    ],
    'language' => 'en-US',
    'controllerNamespace'=>'app\\controllers',
    'components' => 
        array_merge($components,
            [
                'urlManager' => [
                    'showScriptName' => true,
                    'enablePrettyUrl' => true,
                    'showScriptName' => false
                ],
                'user' => [
                    'identityClass' => 'devskyfly\yiiModuleAdminPanel\models\auth\User',
                    'enableAutoLogin' => true,
                ],
                'errorHandler' => [
                    'errorAction' => 'site/error',
                ],
                'request' => [
                    'cookieValidationKey' => 'test',
                    'enableCsrfValidation' => false,
                ]
        ]),
    'modules' => 
        array_merge($modules,
        [])
];
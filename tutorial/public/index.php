<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;



// Register an autoloader
$loader = new Loader();

$loader->registerDirs(
    [
        "../app/controllers/",
        "../app/models/",
    ]
);

$loader->register();



// Create a DI
$di = new FactoryDefault();

// Setup the view component
$di->set(
    "view",
    function () {
        $view = new View();

        $view->setViewsDir("../app/views/");

        return $view;
    }
);

// Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set(
    "url",
    function () {
        $url = new UrlProvider();

        $url->setBaseUri("/");

        return $url;
    }
);

/*$di->set('db', function () {
    require '../app/config/medoo.php';
    return new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'store',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'goodluck123',
        'charset' => 'utf8',

        // 可选参数
        'port' => 3306,

        // 可选，定义表的前缀
        //'prefix' => 'PREFIX_',

        // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
        'option' => [
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
});*/

// 设置数据库服务
$di->set(
    "db",
    function () {
        return new DbAdapter(
            [
                "host"     => "localhost",
                "username" => "root",
                "password" => "goodluck123",
                "dbname"   => "store",
            ]
        );
    }
);

$application = new Application($di);

try {
    // Handle the request

    $response = $application->handle();

    $response->send();
} catch (\Exception $e) {
    echo "Exception: ", $e->getMessage();
}
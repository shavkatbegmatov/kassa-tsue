<?php

use framework\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('DEBUG', 1);
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/framework/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/framework/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('LAYOUT', 'def');
define('ADMIN', 'http://code.tsue.uz/admin');

require '../vendor/framework/libs/functions.php';
require __DIR__ . '/../vendor/autoload.php';

// spl_autoload_register(function($class) {
//     $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
//     if (is_file($file)) {
//         require_once $file;
//     }
// });

new \framework\core\App;

Router::add('^blog/(?P<action>[a-z-]+)/(?P<alias>[a-z-1-9-]+)$', ['controller' => 'Blog']);
Router::add('^blog/(?P<alias>[a-z-1-9-]+)$', ['controller' => 'Blog', 'action' => 'show']);

Router::add('^product/(?P<action>[a-z-]+)/(?P<alias>[a-z-1-9-]+)$', ['controller' => 'Product']);
Router::add('^product/(?P<alias>[a-z-1-9-]+)$', ['controller' => 'Product', 'action' => 'show']);

Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] != 'admin') {
        if ($_SESSION['user']['role'] != 'user') {
            if (Router::getRoute()['controller'] != ucfirst($_SESSION['user']['role'])) {
                if (Router::getRoute()['controller'] != 'User') {
                    redirect('/' . $_SESSION['user']['role']);
                }
            }
        }
    }
}
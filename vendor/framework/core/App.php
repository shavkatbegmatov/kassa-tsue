<?php

namespace framework\core;

use framework\core\Router;
use framework\core\ErrorHandler;

class App {
    public static $app;

    public function __construct() {
        session_start();
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}
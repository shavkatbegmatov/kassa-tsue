<?php

namespace framework\core\base;

class Lang {

    public static $langData = [];
    public static $langLayout = [];
    public static $langView = [];

    public static function load($code, $view) {
        $langLayout = APP . "/langs/{$code['code']}.php";
        $langView = APP . "/langs/{$code['code']}/{$view['controller']}/{$view['action']}.php";

        if (file_exists($langLayout)) {
            self::$langLayout = require_once $langLayout;
        }

        if (file_exists($langView)) {
            self::$langView = require_once $langView;
        }

        self::$langData = array_merge(self::$langLayout, self::$langView);
    }

    public static function get($key) {
        return isset(self::$langData[$key]) ? self::$langData[$key] : $key;
    }
}
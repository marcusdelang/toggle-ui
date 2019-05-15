<?php

/**
 * Some utility methods.
 */
final class Util {

    const SYMBOL_PREFIX = "TOGGLE_";

    private function __construct() {
        
    }

    /**
     * This function should be called first in any PHP page receiving a HTTP request.
     */
    public static function initRequest() {
        spl_autoload_register(function ($class) {
            require_once 'classes/' . \str_replace('\\', '/', $class) . '.php';
        });

    }

    private static function defineConstants() {
        self::defineConstant('VIEWS', 'resources/views/');
        self::defineConstant('CSS', 'resources/css/');
        self::defineConstant('FRAGMENTS', 'resources/fragments/');
    }

    private static function defineConstant($param, $value) {
        define(self::SYMBOL_PREFIX . $param, $value);
    }

}
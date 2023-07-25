<?php

if (!function_exists("getConfigPath")) {
    function getConfigPath () {
        return __DIR__ . "/../config/";
    }
}

if (!function_exists("configs")) {
    function configs_json ($name) {
        return (new \Core\Libs\Configs\JsonConfigReader())->readConfigFile($name);
    }
}
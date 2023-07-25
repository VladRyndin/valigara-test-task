<?php


namespace Core\Libs\Configs;


abstract class ConfigReader
{
    private string $config_path;

    public function __construct() {
        $this->config_path = getConfigPath();
    }

    public abstract function readConfigFile(string $name);


    protected function getConfigPath () {
        return $this->config_path;
    }

}
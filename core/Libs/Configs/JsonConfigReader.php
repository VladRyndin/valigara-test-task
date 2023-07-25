<?php


namespace Core\Libs\Configs;


class JsonConfigReader extends ConfigReader
{
    public function readConfigFile (string $name) {

        if (file_exists($this->getConfigPath() . $name)) {
            if (strpos($name, ".json") !== false) {
                $answer = json_decode(file_get_contents($this->getConfigPath() . $name), true);
            }
        }

        return $answer ?? [];
    }
}
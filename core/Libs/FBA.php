<?php


namespace Core\Libs;


abstract class FBA extends ApiRequests
{

    const BASE_URI = "https://sandbox.sellingpartnerapi-na.amazon.com/";

    const TOKEN = "Atc|MQEBIF...";

    public function __construct(array $config = [])
    {
        $config["base_uri"] = self::BASE_URI;
        parent::__construct($config);
        $this->setHeaders(["x-amz-access-token" => self::TOKEN]);
    }

    public abstract function execute ();

    public abstract function setData (array $data);
}
<?php


namespace Core\Libs;


abstract class FBA extends ApiRequests
{

    const BASE_URI = "https://sandbox.sellingpartnerapi-na.amazon.com/";

    const TOKEN = "Atc|MQEBIFViym24GujWwiYM-YI_ukgVvzOigyz5u5k2t4CEaFTFhUYYjOZyP0OemQ38lhZnzmTj_vo0HueUhnCJQWeo_rCM8x-4pgHnLIwFTtMY2N02EgBtxxbn3Kxno25PXTpn8fCxMsbkJW_28xnywiFiHhbBbQkw7YjuA1dz0mncIQKAlC0iB7dJGCuXvD6e0ry1G0ebvocPAeMYaflWO1zrigYUCKoMGIKnKpTNiciOOdhudQlhTAKxfnP9Y2_MEXV7pFc";

    public function __construct(array $config = [])
    {
        $config["base_uri"] = self::BASE_URI;
        parent::__construct($config);
        $this->setHeaders(["x-amz-access-token" => self::TOKEN]);
    }

    public abstract function execute ();

    public abstract function setData (array $data);
}
<?php


namespace App\FBA;


class GetPackageTrackingDetails extends \Core\Libs\FBA
{
    const METHOD = "GET";
    const URI = "/fba/outbound/2020-07-01/tracking";

    private array $data;

    public function execute()
    {
        return $this->setQuery($this->data)->makeCall(self::METHOD, self::URI);
    }

    public function setData(array $data)
    {
        $this->data["packageNumber"] = $data["number"];
        return $this;
    }
}
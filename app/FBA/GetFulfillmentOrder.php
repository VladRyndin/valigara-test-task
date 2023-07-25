<?php


namespace App\FBA;


class GetFulfillmentOrder extends \Core\Libs\FBA
{

    private $sellerFulfillmentOrderId;
    const METHOD = "GET";
    const URI = "/fba/outbound/2020-07-01/fulfillmentOrders/{sellerFulfillmentOrderId}";

    public function execute()
    {
        return $this->makeCall(self::METHOD, $this->setData(['id' => $this->sellerFulfillmentOrderId]));
    }

    public function setData(array $data)
    {
        return str_replace("{sellerFulfillmentOrderId}", $data["id"], self::URI);
    }

    public function setSellerId ($id) {
        $this->sellerFulfillmentOrderId = $id;
        return $this;
    }
}
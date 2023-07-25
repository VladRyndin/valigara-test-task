<?php


namespace App\FBA;


class CreateFulfillmentOrder extends \Core\Libs\FBA {

    const METHOD = "POST";
    const SPEED = "Standard";
    const URI = "fba/outbound/2020-07-01/fulfillmentOrders";

    private array $data = [];

    public function execute() {
        $this->setBodyData($this->data)->setHeaders(["Accept" => "application/json"])
            ->makeCall(self::METHOD, self::URI);
    }

    public function setData(array $data)
    {
        $this->data = [
            "sellerFulfillmentOrderId" => $data["order_unique"],
            "displayableOrderId" => $data["order_id"],
            "displayableOrderDate" => $data["order_date"],
            "displayableOrderComment" => $data["comments"],
            "shippingSpeedCategory" => self::SPEED,
            "destinationAddress" => $this->getAddress($data),
            "items" => $this->getItemsArr($data["products"]),
        ];
        // TODO: Implement setData() method.
        return $this;
    }


    private function getAddress (array $data) {
        return [
            "name" => $data["shiping_name"],
            "addressLine1" => $data["shipping_adress"],
            "stateOrRegion" => $data["shipping_state"],
            "postalCode" => $data["shipping_zip"],
            "countryCode" => $data["shipping_country"],
        ];
    }

    private function getItemsArr ($items) {
        $_item = [];
        foreach ($items as $item) {
            $_item[] = [
                'sellerSku' => $item["sku"],
                'sellerFulfillmentOrderItemId' => $item["product_id"],
                'quantity' => $item["ammount"],
            ];
        }
        return $_item;
    }
}
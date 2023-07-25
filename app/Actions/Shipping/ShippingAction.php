<?php

namespace App\Actions\Shipping;

use App\Data\AbstractOrder;
use App\Data\BuyerInterface;
use App\Services\ShippingServiceInterface;
use App\FBA\{CreateFulfillmentOrder, GetFulfillmentOrder, GetPackageTrackingDetails};

class ShippingAction implements ShippingServiceInterface {

    private GetFulfillmentOrder $getFulfillmentOrder;
    private CreateFulfillmentOrder $createFulfillmentOrder;
    private GetPackageTrackingDetails $getPackageTrackingDetails;

    public function __construct() {
        $this->getFulfillmentOrder = new GetFulfillmentOrder();
        $this->createFulfillmentOrder = new CreateFulfillmentOrder();
        $this->getPackageTrackingDetails = new GetPackageTrackingDetails();
    }

    public function ship(AbstractOrder $order, BuyerInterface $buyer): string {
        $order->load();
        $this->createFulfillmentOrder->setData($order->data)->execute();
        $fulfillmentOrder = $this->getFulfillmentOrder->setSellerId($order->data["order_unique"])->execute()
            ->getAnswer();

        if (!empty($fulfillmentOrder["payload"]["fulfillmentShipments"]["packageNumber"])) {
            $tracking = $this->getPackageTrackingDetails
                ->setData(["number" => $fulfillmentOrder["payload"]["fulfillmentShipments"]["packageNumber"]])
                ->execute()->getAnswer();
        }

        return $tracking["payload"]["trackingNumber"] ?? "";
    }
}
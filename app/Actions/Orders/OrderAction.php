<?php


namespace App\Actions\Orders;


class OrderAction extends \App\Data\AbstractOrder {

    private string $orderFile;

    public function __construct(int $id, string $orderFileName)
    {
        parent::__construct($id);
        $this->orderFile = $orderFileName;
    }

    protected function loadOrderData(int $id): array {
        $order = configs_json($this->orderFile);
        if (isset($order["id"]) && $order["id"] == $id) {
            return $order;
        }

        return [];
    }
}
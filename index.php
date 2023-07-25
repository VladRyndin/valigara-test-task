<?php

require "./vendor/autoload.php";

use App\Data\Contract\Buyer;
use App\Actions\{Orders\OrderAction, Shipping\ShippingAction};

$buyer = new Buyer;

$data = configs_json("mock/buyer.29664.json");
foreach ($data as $key => $datum) {
    $buyer[$key] = $datum;
}


$ships = new ShippingAction();
$ships->ship(new OrderAction(16401, "mock/order.16400.json"), $buyer);

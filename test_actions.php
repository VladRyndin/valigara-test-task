<?php

require "./vendor/autoload.php";

use App\Actions\OrderAction;
$order = new OrderAction(16401, "mock/order.16400.json");
$order->load();
var_dump($order->getData());

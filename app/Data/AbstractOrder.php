<?php

namespace App\Data;

abstract class AbstractOrder
{

    //aaa
    private int $id;

    //
    public ?array $data;

    //sss
    abstract protected function loadOrderData(int $id): array;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    final public function getOrderId(): int
    {
        return $this->id;
    }
    //2222

    final public function load(): void
    {
        $this->data = $this->loadOrderData($this->getOrderId());
    }

}

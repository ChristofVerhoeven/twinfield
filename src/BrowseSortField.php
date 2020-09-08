<?php

namespace PhpTwinfield;

use PhpTwinfield\Enums\Order;

class BrowseSortField
{
    /** @var string */
    private $code;

    /** @var Order|null */
    private $order;

    /**
     * SortField constructor.
     *
     * @param string $code
     * @param null|Order $order
     */
    public function __construct(string $code, Order $order = null)
    {
        $this->code = $code;
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return null|Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param null|Order $order
     */
    public function setOrder(Order $order = null)
    {
        $this->order = $order;
    }
}

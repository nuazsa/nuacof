<?php

namespace Nuazsa\Nuacof\Services;

use Nuazsa\Nuacof\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    /**
     * Constructor for OrderRepository.
     *
     * @param OrderRepository $orderRepository The repository for admin authentication.
     */
    public function __construct()
    {
        $this->orderRepository = new OrderRepository;
    }

    public function getAllOrder()
    {
        $id = $this->orderRepository->getAllOrder();
        return $id;
    }

    public function changestatus($idTransaction, $status)
    {
        $id = $this->orderRepository->updateStatus($idTransaction, $status);
        return $id;
    }
}

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

    public function getAllOrder($filter, $order, $pagination)
    {
        $id = $this->orderRepository->getAllOrder($filter, $order, $pagination);
        return $id;
    }

    public function countOrder()
    {
        $total = $this->orderRepository->getTotalOrder();
        $total = $total['total'];
        return $total;
    }

    public function changestatus($idTransaction, $status)
    {
        $id = $this->orderRepository->updateStatus($idTransaction, $status);
        return $id;
    }
}

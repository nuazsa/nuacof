<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\OrderService;

class OrdersController
{
    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrder();
        // var_dump($orders); exit;
        $model = [
            'title' => 'Orders',
            'css' => '/Orders/style',
            'action' => 'Date',
            'orders' => $orders
        ];
        view::render('admin/orders/orders', $model);
    }

    public function completeorder($idTransaction)
    {
        $status = 'Completed';
        $result = $this->orderService->changestatus($idTransaction, $status);

        if ($result) {
            echo "
            <script>
                alert('Order completed!');
                window.location.href = '/admin/orders';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Failed to completed order!');
                window.location.href = '/admin/orders';
            </script>
            ";
        }
    }

    public function vieworder()
    {
        $orders = $this->orderService->getAllOrder();
        $model = [
            'title' => 'ViewOrder',
            'css' => '/Orders/detail',
            'orders' => $orders
        ];
        view::render('admin/orders/view', $model);
    }
}

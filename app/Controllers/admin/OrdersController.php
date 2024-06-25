<?php

namespace Nuazsa\Nuacof\Controllers\admin;

use Nuazsa\Nuacof\View;
use Nuazsa\Nuacof\Services\OrderService;

class OrdersController
{
    private $orderService;
    
    private string $filter;
    private string $sort;
    private int $pagination;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        $this->filter = isset($_SESSION['order_filter']) ? $_SESSION['order_filter'] : '';
        $this->sort = isset($_SESSION['order_sort']) ? $_SESSION['order_sort'] : '';
        $this->pagination = isset($_SESSION['order_pagination']) ? $_SESSION['order_pagination'] : 0;

        $count = $this->orderService->countOrder();

        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (isset($_POST['order_filter'])) {
                $this->filter = htmlspecialchars($_POST['order_filter']);
                $_SESSION['order_filter'] = $this->filter;
            }
            if (isset($_POST['order_sort'])) {
                $this->sort = htmlspecialchars($_POST['order_sort']);
                $_SESSION['order_sort'] = $this->sort;
            } 

            if (isset($_POST['pagination'])) {
                $direction = $_POST['order_pagination'];
                if ($direction === '+' || $direction === '-') {
                    $this->pagination += ($direction === '+') ? 5 : -5;
                    $this->pagination = max(0, min($this->pagination, $count));
                    $_SESSION['order_pagination'] = $this->pagination;
                }
            }
        }   

        $orders = $this->orderService->getAllOrder($this->filter, $this->sort, $this->pagination);

        $model = [
            'title' => 'Orders',
            'css' => '/Orders/style',
            'count' => $count,
            'filter' => $this->filter,
            'sort' => $this->sort,
            'pagination' => $this->pagination,
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
        $orders = $this->orderService->getAllOrder($this->filter, $this->sort, $this->pagination);
        $model = [
            'title' => 'ViewOrder',
            'css' => '/Orders/detail',
            'orders' => $orders
        ];
        view::render('admin/orders/view', $model);
    }
}

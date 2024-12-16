<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function getAllOrders();

    public function getOrderById($orderId): ?Order;

    public function createOrder(array $orderData): Order;

    public function updateOrder($orderId, array $newOrderData): bool;

    public function deleteOrder($orderId): bool;
}

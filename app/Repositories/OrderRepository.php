<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAllOrders()
    {
        return Order::paginate();
    }

    public function getOrderById($orderId): ?Order
    {
        return Order::find($orderId);
    }

    public function createOrder(array $orderData): Order
    {
        return Order::create($orderData);
    }

    public function updateOrder($orderId, array $newOrderData): bool
    {
        $order = $this->getOrderById($orderId);

        return $order ? $order->update($newOrderData) : false;
    }

    public function deleteOrder($orderId): bool
    {
        $order = $this->getOrderById($orderId);

        return $order ? $order->delete() : false;
    }
}

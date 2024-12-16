<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getAllOrders();
    }

    public function getOrderById($orderId)
    {
        $order = $this->orderRepository->getOrderById($orderId);
        if (! $order) {
            throw new ModelNotFoundException('Order Not Found');
        }

        return $order;
    }

    public function createOrder(array $orderData)
    {
        return $this->orderRepository->createOrder($orderData);
    }

    public function updateOrder($orderId, array $newOrderData)
    {
        $order = $this->getOrderById($orderId);
        if (! $order) {
            throw new ModelNotFoundException('Order Not Found');
        }

        return $this->orderRepository->updateOrder($orderId, $newOrderData)
            ? $this->orderRepository->getOrderById($orderId) :
            $this->orderRepository->updateOrder($orderId, $newOrderData);
    }

    public function deleteOrder($orderId)
    {
        $order = $this->getOrderById($orderId);
        if (! $order) {
            throw new ModelNotFoundException('Order Not Found');
        }

        return $this->orderRepository->deleteOrder($orderId);
    }
}

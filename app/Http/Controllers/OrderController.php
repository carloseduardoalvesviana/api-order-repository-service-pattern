<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return response()->json($this->orderService->getAllOrders());
    }

    public function show($id)
    {
        try {
            return response()->json($this->orderService->getOrderById($id));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(Request $request)
    {
        $orderData = $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'is_fulfilled' => 'boolean',
        ]);

        try {
            return response()->json($this->orderService->createOrder($orderData), 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $newOrderData = $request->validate([
            'product_name' => 'string',
            'quantity' => 'integer',
            'price' => 'numeric',
            'is_fulfilled' => 'boolean',
        ]);
        try {
            return response()->json($this->orderService->updateOrder($id, $newOrderData));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        try {
            $this->orderService->deleteOrder($id);

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

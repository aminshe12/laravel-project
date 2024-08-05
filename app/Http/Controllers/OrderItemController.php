<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemStoreRequest;
use App\Http\Requests\OrderItemUpdateRequest;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $orderItems = OrderItem::all();
        return view('order_items.index', compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $orders = Order::all();
        return view('order_items.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderItemStoreRequest $request): RedirectResponse
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer',
            'price_per' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);
        $orderItem = new OrderItem();
        $orderItem->order_id = $request->order_id;
        $orderItem->product_id = $request->product_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price_per = $request->price_per;
        $orderItem->total_price = $request->total_price;
        $orderItem->save();

        return redirect()->route('order_items.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem): View
    {
        return view('order_items.show', compact('orderItem'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem): View
    {
        $orders = Order::all();
        return view('order_items.edit', compact('orderItem', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderItemUpdateRequest $request, OrderItem $orderItem): RedirectResponse
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:flowers,id',
            'quantity' => 'required|integer',
            'price_per' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);
        $orderItem->order_id = $request->order_id;
        $orderItem->product_id = $request->product_id;
        $orderItem->quantity = $request->quantity;
        $orderItem->price_per = $request->price_per;
        $orderItem->total_price = $request->total_price;
        $orderItem->save();

        return redirect()->route('order_items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem): RedirectResponse
    {
        $orderItem->delete();
        return redirect()->route('order_items.index');
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
//        if (Auth::user()->role !== 'admin') {
//            return redirect()->route('home')->with('error', 'Access denied');
//        }

        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $orders): View
    {
        return view('orders.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $orders): View
    {
        return view('orders.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateRequest $request, Order $orders): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
        ]);
        $orders->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $orders): RedirectResponse
    {
        $orders->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

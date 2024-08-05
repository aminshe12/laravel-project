<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Show all payments
    public function index(): View
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }

    // Show the form for creating a new payment
    public function create(): View
    {
        return view('payments.create');
    }

    // Store a newly created payment in the database
    public function store(PaymentStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string',
            'payment_status' => 'required|string',
        ]);

        Payment::create($validatedData);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    // Display the specified payment
    public function show($id): View
    {
        $payment = Payment::findOrΩFail($id);
        return view('payments.show', compact('payment'));
    }

    // Show the form for editing the specified payment
    public function edit($id): View
    {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    // Update the specified payment in the database
    public function update(PaymentUpdateRequest $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'transaction_id' => 'nullable|string',
            'payment_status' => 'required|string',
        ]);

        Payment::whereId($id)->update($validatedData);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    // Remove the specified payment from the database
    public function destroy($id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}

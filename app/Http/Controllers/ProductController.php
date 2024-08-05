<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\Diff\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::query()->with('category')->get();
        return view('product.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::query()->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $product              = new Product();
        $product->name        = $request->get('name');
        $product->description = $request->get('description');
        $product->price       = $request->input('price');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $imagePath      = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        try
        {
            $categories = category::all();
            $product = Product::query()->findOrFail((int)$id);
        }catch (Exception $e) {
            return \view('product.index')->with('error', 'Product not found!' . $e->getMessage());
        }

        return view('product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id ): RedirectResponse
    {
        try
        {
            $product              = Product::query()->findOrFail((int)$id);
            $product->name        = $request->get('name'       );
            $product->description = $request->get('description');
            $product->price       = $request->get('price'      );
            $product->category_id = $request->get('category_id');

            if ($request->hasFile('image')) {
                $imagePath      = $request->file('image')->store('images', 'public');
                $product->image = $imagePath;
            }

            $product->update();
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        } catch (Exception $e) {
            return redirect()->route('product.index')->with('error', 'Error occurred while updating product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try{
            $product = Product::query()->findOrFail((int)$id);
            $product->delete();
        }catch (Exception $e) {
            return redirect()->route('product.index')->with('success', 'Error occurred while deleting product: ' . $e->getMessage());
        }

        return redirect()->route('product.index')->with('success', 'product deleted successfully.');
    }
}

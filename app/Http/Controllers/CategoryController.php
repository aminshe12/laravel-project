<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\categoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use SebastianBergmann\Diff\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        try
        {
            $category              = new Category();
            $category->name        = $request->get('name');
            $category->description = $request->get('description');
            $category->save();
        }catch (Exception $e) {
            return redirect()->route('category.create')->with('error', 'There was an error adding the category: ' . $e->getMessage());
        }

        return redirect()->route('category.index')->with('success', 'category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        try{
            $category = Category::query()->findOrFail((int)$id);
        }catch (Exception $e) {
            return \view('category.index')->with('error', 'Category not found!' . $e->getMessage());
        }

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        try{
            $category = Category::query()->findOrFail((int)$id);
        }catch (Exception $e) {
            return \view('category.index')->with('error', 'Category not found!' . $e->getMessage());
        }

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryUpdateRequest $request, string $id): RedirectResponse
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        try
        {
            $category              = Category::query()->findOrFail((int)$id);
            $category->name        = $request->get('name');
            $category->description = $request->get('description');
            $category->update();

        }catch (Exception $e) {
            return redirect()->route('category.index')->with('success', 'Error occurred while updating category: ' . $e->getMessage());
        }

        return redirect()->route('category.index')->with('success', 'category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try{
            $category = Category::query()->findOrFail((int)$id);
            $category->delete();
        }catch (Exception $e) {
            return redirect()->route('category.index')->with('success', 'Error occurred while deleting category: ' . $e->getMessage());
        }

        return redirect()->route('category.index')->with('success', 'category deleted successfully.');
    }
}

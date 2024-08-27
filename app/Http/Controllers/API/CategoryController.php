<?php

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            $category = Category::create($validatedData);
            return response()->json(['category' => $category, 'message' => 'Category created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'There was an error adding the category: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json($category, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Category not found!'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            $category = Category::findOrFail($id);
            $category->update($validatedData);
            return response()->json(['category' => $category, 'message' => 'Category updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while updating category: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred while deleting category: ' . $e->getMessage()], 500);
        }
    }
}

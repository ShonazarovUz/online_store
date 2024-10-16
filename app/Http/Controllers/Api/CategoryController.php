<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create([
            'name'      => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Category
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    // Validatsiya qilish
    $validatedData = $request->validate([
        'name'      => 'required|string|max:255',
        'parent_id' => 'nullable|exists:categories,id', 
    ]);
    $updated = $category->update($validatedData);

    if ($updated) {
        return response()->json(['name' => $category->name]);
    }

    return response()->json(['error' => 'Category update failed'], 500);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): \Illuminate\Http\JsonResponse
    {
        $deleted = $category->delete();

        if ($deleted) {
            return response()->json([], 204);
        }

        return response()->json(['message' => 'Resource not deleted'], 500);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcategories = Category::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allcategories");
        return view('Category.view')->with($compact);
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
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::where('name', $request->name)->count();
        if ($category == 0) {
            $input = $request->all();
            $input['name'] = ucfirst($request->name);
            $input['added_from'] = session()->get('user_added');
            Category::create($input);
            return response()->json([
                "message" => "category",
                "data" => Category::where('added_from', session()->get('user_added'))->latest()->get(),
            ]);
        } else {
            return response()->json([
                "error" => "already exists",
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json([
            "message" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $input = $request->all();
        $input['name'] = ucfirst($request->name);
        $input['added_from'] = session()->get('user_added');
        $category->update($input);
        return response()->json([
            "module" => "category",
            "module_data" => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories'
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'New category has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ];

        // if ( $request->slug != $category->slug ) {
        //     $rules['slug'] = 'required|unique:categories';
        // }

        // if ( $request->name != $category->name ) {
        //     $rules['name'] = 'required|unique:categories';
        // }

        $validatedData = $request->validate($rules);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect()->back()->with('success', 'The category has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('category.index', [
            'title' => 'Grombyang | Categories',
            'categories' => Category::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function add(): View
    {
        return view('category.add', [
            'title' => 'Grombyang | Add new Category'
        ]);
    }

    public function edit($uuid): View
    {
        return view('category.edit', [
            'title' => 'Grombyang | Edit Category',
            'category' => Category::where('uuid', $uuid)->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'upload' => 'required|mimes:png,jpg,jpeg|max:5242',
        ]);
        $upload = $request->file('upload')->store('categories');
        Category::insert([
            'user_id' => auth()->user()->id,
            'uuid' => uuid_create(),
            'photo' => "storage/$upload",
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => 'active',
            'created_at' => now()
        ]);
        return redirect()->route('category.index')->with([
            'title' => 'Added new data',
            'icon' => 'success',
            'text' => 'Success added data to category!'
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'uplaod' => 'mimes:png,jpg,jpeg|max:5242'
        ]);
        $category = Category::where('uuid', $uuid)->first();
        $upload = $category->photo;
        if ($request->file('upload')) {
            $upload = "storage/" . $request->file('upload')->store('categories');
        }
        Category::where('uuid', $uuid)->update([
            'photo' => $upload,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('category.index')->with([
            'title' => 'Edited data',
            'icon' => 'success',
            'text' => 'Success edited data category!'
        ]);
    }

    public function delete($uuid)
    {
        Category::where('uuid', $uuid)->update([
            'status' => 'inactive',
            'deleted_at' => now(),
        ]);
        return response()->json([
            'title' => 'Deleted!',
            'icon' => 'success',
            'text' => 'Your data has been deleted.'
        ]);
    }
}

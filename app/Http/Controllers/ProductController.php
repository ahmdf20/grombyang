<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('product.index', [
            'title' => 'Grombyang | Product List',
            'products' => Product::where([
                ['user_id', auth()->user()->id],
                ['deleted_at', null],
                ['is_restricted', 0]
            ])->get()->all()
        ]);
    }

    public function bin(): View
    {
        return view('product.bin', [
            'title' => 'Grombyang | Recycle Bin',
            'products' => Product::where([
                ['user_id', auth()->user()->id],
                ['deleted_at', '!=', null]
            ])->get()->all()
        ]);
    }

    public function add(): View
    {
        return view('product.add', [
            'title' => 'Grombyang | Add New Product',
            'categories' => Category::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function edit($uuid): View
    {
        return view('product.edit', [
            'title' => 'Grombyang | Edit Product',
            'categories' => Category::where([
                ['deleted_at', null]
            ])->get()->all(),
            'product' => Product::where('uuid', $uuid)->first()
        ]);
    }

    public function detail($uuid): View
    {
        return view('product.detail', [
            'title' => 'Grombyang | Detail Product',
            'product' => Product::where('uuid', $uuid)->first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'upload' => 'required|mimes:png,jpg,jpeg|max:5242',
            'categories' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required'
        ]);

        $upload = $request->file('upload')->store('products');

        $current_product_id = Product::insertGetId([
            'uuid' => uuid_create(),
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => "storage/$upload",
            'stock' => $request->stock,
            'weight' => $request->weight,
            'created_at' => now(),
        ]);

        foreach ($request->categories as $categories) {
            DB::table('products_categories')->insert([
                'product_id' => $current_product_id,
                'category_id' => $categories,
                'created_at' => now()
            ]);
        }

        return redirect()->route('product.index')->with([
            'title' => 'Added new data',
            'icon' => 'success',
            'text' => 'Success added data to product!'
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'upload' => 'mimes:png,jpg,jpeg|max:5242',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required'
        ]);
        $product = Product::where('uuid', $uuid)->first();
        $upload = $product->image;
        if ($request->file('upload')) {
            $upload = "storage/" . $request->file('upload')->store('products');
        }
        Product::where('uuid', $uuid)->update([
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $upload,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'updated_at' => now()
        ]);

        return redirect()->route('product.index')->with([
            'title' => 'Edited data',
            'icon' => 'success',
            'text' => 'Success edited data product!'
        ]);
    }

    public function delete($uuid)
    {
        Product::where('uuid', $uuid)->update([
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

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create',
            [
                'categories' => $categories,
                'product' => null,
            ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required'],
            'price' => ['required'],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        $category = Category::find($data['category_id']);

        $category->products()->create($data);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'name' => ['required'],
            'price' => ['required'],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        $category = Category::find($data['category_id']);

        $product->category()->associate($category);

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        //
    }
}

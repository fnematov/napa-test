<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateUpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderByDesc('id')->get();
        $totalPriceWithVat = $products->sum('priceWithVat');
        return view('products.index', ['products' => $products, 'totalPriceWithVat' => $totalPriceWithVat]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductCreateUpdateRequest $request)
    {
        Product::query()->create($request->validated());

        return redirect('products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product, ProductCreateUpdateRequest $request)
    {
        $product->fill($request->validated());
        $product->save();

        return redirect('products');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products');
    }

    public function activities(Product $product)
    {
        $activities = $product->activities;

        return view('products.activities', compact('activities'));
    }
}

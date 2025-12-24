<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'estado' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $data['estado'] = $request->has('estado') ? (bool)$request->estado : 1;

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Producto creado.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'estado' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $data['estado'] = $request->has('estado') ? (bool)$request->estado : 1;

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado.');
    }
}

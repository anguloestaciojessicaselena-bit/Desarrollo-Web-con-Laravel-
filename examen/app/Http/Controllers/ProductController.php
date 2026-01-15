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

    public function inventory()
    {
        $products = Product::with('category')->get();
        $lowStockCount = Product::where('stock', '<', 10)->count();
        $totalStock = Product::sum('stock');
        return view('products.inventory', compact('products', 'lowStockCount', 'totalStock'));
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
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['estado'] = $request->boolean('estado');

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
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
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data['estado'] = $request->boolean('estado');

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}

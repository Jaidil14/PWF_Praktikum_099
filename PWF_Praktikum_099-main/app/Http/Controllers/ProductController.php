<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'qty'      => 'required|integer|min:0',
            'price'    => 'required|numeric|min:0',
            'user_id'  => 'required|exists:users,id',
        ]);

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product berhasil ditambahkan');
    }

    public function create()
    {
        $users = User::orderBy('name')->get();

        return view('product.create', compact('users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'qty'     => 'required|integer|min:0',
            'price'   => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product berhasil diupdate');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $users   = User::orderBy('name')->get();

        return view('product.edit', compact('product', 'users'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}

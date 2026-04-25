<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Product::class);
        $products = Product::all();

        return view('product.index', compact('products'));
    }


    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);
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
        Gate::authorize('create', Product::class);
        $users = User::orderBy('name')->get();

        return view('product.create', compact('users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('view', $product);

        return view('product.view', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);

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
        Gate::authorize('update', $product);
        $users   = User::orderBy('name')->get();

        return view('product.edit', compact('product', 'users'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}

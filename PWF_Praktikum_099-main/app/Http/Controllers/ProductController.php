<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Product::class);
        $products = Product::paginate(10);

        return view('product.index', compact('products'));
    }

    public function export()
    {
        Gate::authorize('export-product');

        // Untuk keperluan praktikum, kita bisa gunakan logika dummy seperti ini
        // atau bisa juga generate CSV sungguhan.
        return back()->with('success', 'Export product berhasil dijalankan!');
    }


    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create', Product::class);
        $validated = $request->validated();

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

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);

        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product berhasil diupdate');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        $users = User::orderBy('name')->get();

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

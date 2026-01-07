<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // List products
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('tenant.products.index', compact('products'));
    }

    // Show create form
    public function create()
    {
        return view('tenant.products.create');
    }

    // Store product
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create([
            'name'     => $request->name,
            'price'    => $request->price,
            'quantity' => $request->quantity,
            'user_id'  => Auth::id(),
        ]);

        return redirect()->route('tenant.products.index')
                         ->with('success', 'Product created successfully');
    }
}


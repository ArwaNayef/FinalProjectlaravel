<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('store')->paginate(8);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('website.products')->with('products', $products);
    }

    public function showProducts($id)
    {
        $products = Product::where('store_id', $id)->with('store')->paginate(8);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('website.products')->with('products', $products)->with('id',$id);
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        $product->photo = storage::disk('public')->url($product->photo);
        return view('website.selfProduct')->with('product', $product);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::withTrashed()->with('store')->where('name', 'like', '%' . $search . '%')->paginate(8);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('website.products')->with('products', $products);
    }
}

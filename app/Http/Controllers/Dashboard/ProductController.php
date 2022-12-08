<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withTrashed()->with('store')->paginate(7);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('dashboard.products.index')->with('products', $products);
    }

    public function create()
    {
        $stores = Store::get();
        return view('dashboard.products.create')->with('stores', $stores);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'Required',
            'description' => 'Required',
            'photo' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'base_price' => 'Required',
            'discount_price' => 'Required',
            'flag' => 'Required',
            'store_id' => 'Required',
        ]);
        $image = $request->file('photo');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));

        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');
        $flag = $request->input('flag');
        $store_id = $request->input('store_id');
        $photo = $path;
        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->flag = $flag;
        $product->store_id = $store_id;
        $product->photo = $photo;
        $status = $product->save();

        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $product->photo = storage::disk('public')->url($product->photo);
        $stores = Store::get();
        return view('dashboard.products.edit')->with('product', $product)->with('stores', $stores);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'Required',
            'description' => 'Required',
            'photo' => 'mimes:png,jpg,jpeg,gif|max:2048',
            'base_price' => 'Required',
            'discount_price' => 'Required',
            'flag' => 'Required',
            'store_id' => 'Required',
        ]);
        if ($request->has('photo')) {
            $image = $request->file('photo');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $photo = $path;
            $product = Product::find($id);
            $product->photo = $photo;
            $product->save();
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $base_price = $request->input('base_price');
        $discount_price = $request->input('discount_price');
        $flag = $request->input('flag');
        $store_id = $request->input('store_id');
        $product = Product::find($id);
        $product->name = $name;
        $product->description = $description;
        $product->base_price = $base_price;
        $product->discount_price = $discount_price;
        $product->flag = $flag;
        $product->store_id = $store_id;
        $status = $product->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Product::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Product::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::withTrashed()->with('store')->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('dashboard.products.index')->with('products', $products);
    }
}

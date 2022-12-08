<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::paginate(6);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('website.stores')->with('stores', $stores);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $stores = Store::withTrashed()->where('name', 'like', '%' . $search . '%')->paginate(6);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('website.stores')->with('stores', $stores);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::withTrashed()->paginate(7);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('dashboard.stores.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('dashboard.stores.create');
    }

    public function store(storeRequest $request)
    {
//        $request->validate([
//            'name' => 'Required',
//            'address' => 'Required',
//            'phone' => 'Required',
//            'logo' => 'mimes:png,jpg,jpeg,gif|max:2048',
//        ]);
//        Validator::make($request->all(), [
//            'name' => 'Required',
//            'address' => 'Required',
//            'phone' => 'Required',
//            'logo' => 'mimes:png,jpg,jpeg,gif|max:2048',
//        ]);
        $image = $request->file('logo');
        $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
        $path = "uploads/images/$imgname";
        Storage::disk('public')->put($path, file_get_contents($image));
//        if (!$image) {
//            $msg = 'You must upload image';
//            return redirect()->back()->withErrors(['logo' => $msg]);
//        }
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $logo = $path;
        $store = new Store;
        $store->name = $name;
        $store->address = $address;
        $store->phone = $phone;
        $store->logo = $logo;
        $status = $store->save();

        return redirect()->back()->with('status', $status);
    }

    public function edit($id)
    {
        $store = Store::where('id', $id)->first();
        $store->logo = storage::disk('public')->url($store->logo);
        return view('dashboard.stores.edit')->with('store', $store);
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'Required',
            'address' => 'Required',
            'phone' => 'Required',
            'logo' => 'mimes:png,jpg,jpeg,gif|max:2048',
        ]);
        if ($request->has('logo')) {
            $image = $request->file('logo');
            $imgname = time() + rand(1, 10000000) . '.' . $image->getClientOriginalExtension();
            $path = "uploads/images/$imgname";
            Storage::disk('public')->put($path, file_get_contents($image));
            $logo = $path;
            $store = Store::find($id);
            $store->logo = $logo;
            $status = $store->save();
        }

        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $store = Store::find($id);
        $store->name = $name;
        $store->address = $address;
        $store->phone = $phone;
        $status = $store->save();

        return redirect()->back()->with('status', $status);
    }

    public function destroy($id)
    {
        Store::where('id', $id)
            ->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Store::where('id', $id)
            ->restore();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $stores = Store::withTrashed()->where('name', 'like', '%' . $search . '%')->paginate(7);
        foreach ($stores as $store) {
            $store->logo = storage::disk('public')->url($store->logo);
        }
        return view('dashboard.stores.index')->with('stores', $stores);
    }
}

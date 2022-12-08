<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $transactions = PurchaseTransaction::with('product')->paginate(6);
        return view('dashboard.purchaseTransactions.index')->with('transactions', $transactions);
    }

    public function store($id)
    {
        $product_id = $id;
        $product = Product::find($product_id);
        session()->put($product_id.'Added To Cart',true);
        if ($product->flag == 'base') {
            $price = $product->base_price;
        } else {
            $price = $product->discount_price;
        }
        $time_of_transaction = Carbon::now();
        $transaction = new PurchaseTransaction;
        $transaction->product_id = $product_id;
        $transaction->price = $price;
        $transaction->time_of_transaction = $time_of_transaction;
        $transaction->save();
        return redirect()->back();

    }
}

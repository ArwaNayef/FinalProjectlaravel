<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PurchaseTransactionController extends Controller
{
    public function index()
    {
        $transactions = PurchaseTransaction::with('product')->with('product.store')->paginate(7);
        return view('dashboard.purchaseTransactions.index')->with('transactions', $transactions);
    }

    public function report()
    {
        $products = Product::withTrashed()->paginate(7);
        foreach ($products as $product) {
            $product->photo = storage::disk('public')->url($product->photo);
        }
        return view('dashboard.purchaseTransactions.report')->with('products', $products);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Purches;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Display available mobiles
    public function index()
    {
        $mobiles = Mobile::with(['brand', 'mobileModel'])
                         ->where('qty', '>', 0)
                         ->get();

        return view('mobiles.shop', compact('mobiles'));
    }

    // Add mobile to cart
    public function addToCart(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $mobile = Mobile::findOrFail($id);

        if ($request->qty > $mobile->qty) {
            return back()->withErrors([
                'qty' => 'Requested quantity exceeds available stock.'
            ]);
        }

        $cart = Purches::where('user_id', Auth::id())
            ->where('mobile_id', $id)
            ->where('status', 'cart')
            ->first();

        $totalQty = $request->qty + ($cart ? $cart->qty : 0);

        if ($totalQty > $mobile->qty) {
            return back()->withErrors([
                'qty' => 'Total cart quantity exceeds available stock.'
            ]);
        }

        if ($cart) {
            $cart->update(['qty' => $totalQty]);
        } else {
            Purches::create([
                'user_id' => Auth::id(),
                'mobile_id' => $id,
                'qty' => $request->qty,
                'status' => 'cart'
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }


    
    public function cart()
    {
        $purchases = Purches::with(['mobile.brand', 'mobile.mobileModel'])
            ->where('user_id', Auth::id())
            ->where('status', 'cart')
            ->get();

        return view('mobiles.cart', compact('purchases'));
    }

    public function removeFromCart($id)
    {
        $purchase = Purches::where('id', $id)
        ->where('user_id', Auth::id())
        ->where('status', 'cart')
        ->firstOrFail();

        $purchase->delete();

        return redirect('/cart');
    }

    
public function bill()
{
    $purchases = Purches::with(['mobile.brand', 'mobile.mobileModel'])
        ->where('user_id', Auth::id())
        ->where('status', 'cart')
        ->get();

    if ($purchases->isEmpty()) {
        return redirect('/cart');
    }

    $total = 0;

    foreach ($purchases as $purchase) {
        $total += $purchase->mobile->price * $purchase->qty;
    }

    return view('mobiles.bill', compact('purchases', 'total'));
}

}

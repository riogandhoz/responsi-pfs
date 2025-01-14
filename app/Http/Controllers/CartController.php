<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
                        ->with(['product.category'])
                        ->get();
                        
        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $shipping = $subtotal > 0 ? 20000 : 0;
        $total = $subtotal + $shipping;

        return view('beli.index', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $existingCart = Cart::where('user_id', Auth::id())
                           ->where('product_id', $request->product_id)
                           ->first();

        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('beli.index')
                        ->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if ($cart->user_id !== Auth::id()) {
            return redirect()->route('beli.index')
                           ->with('error', 'Unauthorized action.');
        }

        $cart->update([
            'quantity' => $request->quantity
        ]);

        return redirect()->route('beli.index')
                        ->with('success', 'Cart updated successfully!');
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return redirect()->route('beli.index')
                           ->with('error', 'Unauthorized action.');
        }

        $cart->delete();

        return redirect()->route('beli.index')
                        ->with('success', 'Item removed from cart successfully!');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        // Add your coupon logic here
        
        return redirect()->route('beli.index')
                        ->with('success', 'Coupon applied successfully!');
    }

    public function checkout()
    {
        return redirect()->route('checkout.index');
    }
}


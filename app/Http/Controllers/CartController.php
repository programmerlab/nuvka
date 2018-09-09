<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

use View;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function addItem($productId)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart          =  new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        $cartItem             = new Cartitem();
        $cartItem->product_id = $productId;
        $cartItem->cart_id    = $cart->id;
        $cartItem->save();

        return redirect('/cart');
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', 1)->first();

        if (!$cart) {
            $cart          =  new Cart();
            $cart->user_id = 1; //Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price;
        }

        return view('ecart.index', compact('items', 'total'));
    }

    public function removeItem($id)
    {
        CartItem::destroy($id);

        return redirect('/cart');
    }
}

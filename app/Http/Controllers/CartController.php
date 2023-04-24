<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(\Cart::content());
        return view('cart');
    }

    public function add(int $id) {
        /* Define some defaults */
        $basePrice = 42.42;

        /* Add the product */
        $cart = \Cart::add($id, 'Product ' . $id, 1, $basePrice * $id, 500);


        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }

    public function remove($rowId){
        // get row id
        \Cart::remove($rowId);

        //return to cart page
        return view('cart');
    }

    public function empty(){
        // This will remove all CartItems from the cart for the current cart instance.
        \Cart::destroy();

        //return to cart page
        return view('cart');
    }
}

<?php

namespace App\Http\Controllers;

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
        return view('cart');
    }

    public function add(int $id) {
        /* Define some defaults */
        $basePrice = 42.42;

        /* Add the product */
        \Cart::add($id, 'Product ' . $id, 1, $basePrice * $id, 500);

        /* Redirect to prevend re-adding on refreshing */
        return redirect()->route('cart')->withSuccess('Product has been successfully added to the Cart.');
    }
}

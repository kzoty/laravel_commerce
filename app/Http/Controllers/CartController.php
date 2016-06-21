<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {
	/**
	 * @var Cart
	 */
	private $cart;

	private $items;

	/**
	 * CartController constructor.
	 * @param Cart $cart
	 */
	public function __construct( Cart $cart ) {
		$this->items = [];
		$this->cart = $cart;
        $categories = Category::all();
        view()->share('categories', $categories);
	}

    /**
     * List Cart.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
	    if( !Session::has( 'cart' ) ) {
		    Session::set( 'cart', $this->cart );
	    }

        return view( 'store.cart', [ 'cart' => Session::get( 'cart' ) ] );
	}

    /**
     * Add product to Cart.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add( $id ) {
	   if ( !Session::has( 'cart' ) ) {
	   	    Session::set( 'cart', $this->cart );
	   } else {
	   	    $cart = Session::get( 'cart' );
	   }

        $product = Product::find($id);
        $cart->add( $id, $product->name, $product->price );

        return redirect()->route('cart');
    }
}

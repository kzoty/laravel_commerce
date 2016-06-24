<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
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
	}

	/**
	 * List Cart.
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index() {
	    if( !Session::has( 'cart' ) ) {
			Session::set( 'cart', $this->cart );
		}

	    $cart = Session::get('cart');

	    foreach ( $cart->all() as $eachId => $eachItem ) {
	    	#if ( !$cart->getImage($eachId) ) {
			    $product = Product::find($eachId);
			    $cart->setImage( $eachId, $product->main_image );
		    #}
	    }

        return view( 'store.cart', [ 'cart' => Session::get('cart') ] );
	}

	/**
	 * Add product to Cart.
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function add( $id ) {
		$cart = $this->getCart();

		$product = Product::find( $id );
		$cart->add( $id, $product->name, $product->price );

		return redirect()->route( 'cart' );
	}

	/**
	 * @return mixed
	 */
	private function getCart()
	{
		if ( !Session::has( 'cart' ) ) {
			Session::set( 'cart', $this->cart );
		}

		$cart = Session::get( 'cart' );

		return $cart;
	}

	public function destroy( $id ) {
		$cart = $this->getCart();
		$cart->remove( $id );

		return redirect()->route( 'cart' );
	}
}

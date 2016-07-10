<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function place(Order $orderModel, OrderItem $orderItem) {
        if ( !Session::has( 'cart' ) ) {
            return false;
        }
        $cart = Session::get( 'cart' );
        dd($cart);

	    if ( $cart->getTotal() > 0 ) {
	    	$order = $orderModel->create([
				'user_id' => 1,
			    'total' => $cart->getTotal(),
		    ]);

		    foreach ( $cart->all() as $key => $eachItem ) {
		    	$order->items()->create([
		    		'product_id' => $key,
		    		'price' => $eachItem[ 'price' ],
		    		'qtd' => $eachItem[ 'qtd' ],
		    		'total' => $eachItem[ 'price' ] * $eachItem[ 'qtd' ],
			    ]);
            }
	    }
    }
}
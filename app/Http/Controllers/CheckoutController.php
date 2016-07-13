<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @property Cart cart
 */
class CheckoutController extends Controller {

    protected $cart;
    
    /**
     * CheckoutController constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart) {
        $this->middleware( 'authClient' );
        $this->cart = $cart;
    }

    public function place(Order $orderModel, OrderItem $orderItem) {
        if ( !Session::has( 'cart' ) ) {
            return false;
        }
        $cart = Session::get( 'cart' );
        
	    if ( $cart->getTotal() > 0 ) {
	    	$order = $orderModel->create([
				'user_id' => Auth::User()->id,
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

            /**
             * Clean cart.
             */
		    $cart->clean();
	    } else {
            $order = null;
        }

        return view('store.checkout', compact('order'));
    }
}
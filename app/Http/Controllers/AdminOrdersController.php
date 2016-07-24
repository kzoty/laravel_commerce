<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\Status;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminOrdersController extends Controller {

    protected $order;

    /**
     * AdminOrdersController constructor.
     * @param Order $order
     */
    public function __construct(Order $order ) {
        $this->order = $order;
    }

    public function index() {
        $orders = $this->order->paginate(20);
        $statuses = Status::lists('name','id');

        return view( 'admin.orders.index', compact('orders', 'statuses') );
    }

    public function update(Request $data) {
        $order = $this->order->find( $data->id );
        $order->status_id = $data->status;
        $order->save();

        return redirect()->route( 'admin.orders' );
    }
}

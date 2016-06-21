<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller {

	public function __construct() {
		$categories = Category::all();
		view()->share('categories', $categories);
	}

	public function index() {

        $prodsFeatured = Product::featured()->get();
        $prodsRecommended = Product::recommended()->get();
        
        return view( 'store.index', compact( 'prodsFeatured', 'prodsRecommended' ) );
    }

	public function listByCategory( $id ) {
		$category = Category::find( $id );

		return view( 'store.category', compact( 'category' ) );
	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function product( $id ){
		$product = Product::find( $id );

		return view( 'store.product', compact( 'product' ) );
	}

	public function listByTag( $id ) {
        $tag = Tag::find( $id );
		$products = Product::getProductsByTag( $id );
		return view( 'store.tag', compact('tag', 'products') );
	}
}
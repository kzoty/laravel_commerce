<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller {

    public function index() {
        $categories = Category::all();
        $prodsFeatured = Product::featured()->get();
        $prodsRecommended = Product::recommended()->get();
        
        return view( 'store.index', compact( 'categories', 'prodsFeatured', 'prodsRecommended' ) );
    }

	public function listByCategory( $id ) {
		$categories = Category::all();
		$category = Category::find( $id );

		return view( 'store.category', compact( 'categories', 'category' ) );
	}

	/**
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function product( $id ){
		$categories = Category::all();
		$product = Product::find( $id );

		return view( 'store.product', compact( 'categories', 'product' ) );
	}

	public function listByTag( $id ) {
        $tag = Tag::find( $id );
		$products = Product::getProductsByTag( $id );
        $categories = Category::all();
		return view( 'store.tag', compact('tag', 'categories', 'products') );
	}
}

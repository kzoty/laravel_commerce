<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
	/**
	 * @var Product
	 */
	private $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	public function index() {
		$products =  $this->product->paginate(10);
		return view('admin.products.index', compact('products'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists( "name", "id" );
        return view('admin.products.create', compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->product->fill( $request->all() );
        $this->product->save();
        return redirect()->route( 'admin.products' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $product = $this->product->find( $id );
        $categories = $category->lists("name", 'id');
        return view( 'admin.products.edit', compact( 'product', 'categories' ) );
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param ProductRequest|Pro $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
    public function update(ProductRequest $request, $id)
    {
        $this->product->find( $id )->update( $request->all() );
        return redirect()->route( 'admin.products' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find( $id )->delete();
        return redirect()->route( 'admin.products' );
    }

    public function images( $id ) {
        $product = $this->product->find( $id );

        return view('admin.products.images', compact('product'));
    }

    public function createImage( $id ){
        $product = $this->product->find( $id );
        return view( 'admin.products.createimage', compact('product') );
    }

	public function storeImage( Request $request, $id ) {
		dd($request);
	}
}

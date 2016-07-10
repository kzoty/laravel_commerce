@extends('store.base')

@section('content')
    <section id="cart_items">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Qtd</td>
                        <td class="price">Total</td>
                        <td class="price">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cart->all() as $eachKey => $eachProduct)
                    <tr class="">
                        <td class="cart_product">
                            <a href="">
	                            <img src="{{$eachProduct['image']}}" alt="" width="80">
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{route('store.product',$eachKey)}}">{{$eachProduct['name']}}</a></h4>
                            <p>Código: {{ $eachKey }}</p>
                        </td>
                        <td>
                            R$ {{number_format( $eachProduct['price'], 2, ',', '.' )}}
                        </td>
                        <td>
                            Qtd: <form method="get" action="{{route('cart.update', ['id'=>$eachKey])}}">
                                <input type="number" name="qtd" value="{{$eachProduct['qtd']}}" style="width: 100px">

                                <button class="btn btn-sm glyphicon glyphicon-refresh" type="submit" title="Update Cart"></button>
                            </form>
                        </td>
						<td>
							<h3 class="text-danger">R$ {{number_format( $eachProduct['price'] * $eachProduct['qtd'], 2, ',', '.')}}</h3>
						</td>
	                    <td>
		                    <a href="{{route('cart.destroy',['id'=>$eachKey])}}" class="btn btn-danger btn-sm">Delete</a>
	                    </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            <p class="text-center">No items in Cart</p>
                        </td>
                    </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span>TOTAL: R$ {{number_format($cart->getTotal(), 2, ',', '.')}}</span>

                                <a href="{{route('checkout.place')}}" class="btn btn-success">Fechar Conta</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </section>
@endsection
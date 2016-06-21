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
                    @foreach($cart->all() as $eachKey => $eachProduct)
                    <tr class="">
                        <td class="cart_product">
                            <a href="">
	                            <img src="#" alt="" width="80">
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
                            Qtd: {{$eachProduct['qtd']}}
                        </td>
						<td>
							<h3 class="text-danger">R$ {{number_format( $eachProduct['price'] * $eachProduct['qtd'], 2, ',', '.')}}</h3>
						</td>
	                    <td>
		                    <a href="{{route('cart.destroy',['id'=>$eachKey])}}" class="btn btn-danger btn-sm">Delete</a>
	                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
@endsection
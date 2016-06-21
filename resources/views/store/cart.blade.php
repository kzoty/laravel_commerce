@extends('store.base')

@section('categories')
    @include('store.partials.categories')
@endsection

@section('content')
    <section id="cart_items">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Qtd</td>
                        <td class="price">Total</td>
                        <td class="price"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->all() as $eachKey => $eachProduct)
                    <tr class="">
                        <td class="cart_product">
                            <a href="">
                                <img src="">
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{route('store.product',$eachKey)}}">{{$eachProduct['name']}}</a></h4>
                            <p>Código: {{ $eachKey }}</p>
                        </td>
                        <td>
                            R$ {{$eachProduct['price']}}
                        </td>
                        <td>
                            Qtd: {{$eachProduct['qtd']}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </section>
@endsection
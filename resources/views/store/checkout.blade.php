@extends('store.base')

@section('content')
    <div class="col-sm-9 padding-right">
        @if($order)
        <h3>Pedido realizado com sucesso</h3>
        <p>O Pedido #{{$order->id}}, foi realizado com sucesso!</p>
        <br />
        @else
        <h3>Não há nenhum item no carrinho. Não é possível finalizar ordem.</h3>
        <br />
        @endif
    </div>
@endsection
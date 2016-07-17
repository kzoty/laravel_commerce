Olá {{$user->name}},<br><br>
Aqui está sua ordem:<br>

<h3>Ordem: #{{$order->id}}</h3>
<hr>
<h5>Prdutos da Ordem:</h5>
<table cellpadding="2" cellspacing="2" border="1">
    <thead>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Preço unitário</th>
        <th>Total</th>
    </thead>
@foreach($order->items as $item)
    <tr>
        <td>{{$item->product->name}}</td>
        <td>{{$item->qtd}}</td>
        <td>R$ {{number_format($item->price, 2, ',', '.')}}</td>
        <td>R$ {{number_format($item->total, 2, ',', '.')}}</td>
    </tr>
@endforeach
</table>
<h1>Total: R$ {{number_format($order->total, 2, ',', '.')}}</h1>
<br>
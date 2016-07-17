@extends('store.base')

@section('content')
    <div>
        <h3>Meus Pedidos</h3>
        <table class="table table-responsive table-bordered table-striped">
	        <tbody>
	        <tr>
		        <th>#ID</th>
		        <th>Itens</th>
		        <th>Valor</th>
		        <th>Status</th>
	        </tr>
	        @forelse($orders as $order)
	        <tr>
		        <td>{{$order->id}}</td>
		        <td>
			        <ul>
			        @foreach($order->items as $eachItem)
						<li>{{$eachItem->product->name}}</li>
			        @endforeach
			        </ul>
		        </td>
		        <td>{{$order->total}}</td>
		        <td>{{$order->status}}</td>
	        </tr>
			@endforeach
	        </tbody>
        </table>
    </div>
@endsection
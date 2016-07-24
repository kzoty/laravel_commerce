@extends('admin.base')

@section('content')
    <h3>Orders</h3>
    <table class="table table-hover">
        <thead>
            <th>#ID</th>
            <th>Itens</th>
            <th>Total</th>
            <th>Usuário</th>
            <th>Status</th>
            <th></th>
        </thead>
        @foreach($orders as $order)
        <tbody>
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
            <td>
               {{$order->user->name}}
            </td>
            <td>
                {!! Form::open(['method'=>'post', 'route'=>['admin.orders.update']]) !!}
                {!! Form::select('status', $statuses, $order->status_id, ['class'=>'form-control']) !!}
                {!! Form::hidden('id',$order->id) !!}
            </td>
            <td>
                {!! Form::submit('Atualizar', ['class'=>'form-control btn btn-sm btn-success']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $orders->render() !!}
@endsection
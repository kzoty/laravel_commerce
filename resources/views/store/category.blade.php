@extends('store.base')

@section('categories')
    @include('store.partials.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{$category->name}}</h2>

            @include('store.partials.product', [ 'products' => $category->products ] )

        </div><!--features_items-->

    </div>
@endsection
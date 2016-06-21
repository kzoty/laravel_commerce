@extends('store.base')

@section('categories')
    @include('store.partials.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">

                    @if(count($product->images))
                        <img src="/uploads/{{$product->images->first()->id}}.jpg" alt="" />
                    @else
                        <img src="/images/no-img.jpg">
                    @endif

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
	                        @foreach($product->images as $image)
                                <a href="#"><img src="{{ url('uploads/' . $image->id . '.jpg') }}" alt="" width="80"></a>
							@endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $product->name }}</h2>

                    <p>{{ $product->description }}</p>
                    <span>
                        <span>R$ {{ number_format( $product->price, 2, ',', '.' ) }}</span>
                            <a href="{{route( 'cart.add', [ 'id' => $product->id ] )}}" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>
                    <hr>
                    <strong>Tags: </strong>@include('store.partials.tags', ['tags'=>$product->tags])
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection
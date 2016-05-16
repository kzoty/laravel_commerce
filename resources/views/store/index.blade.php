@extends('store.base')

@section('categories')
    @include('store.categories_partial')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Em destaque</h2>


            @foreach($prodsFeatured as $pfeatured)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">

                            @if(count($pfeatured->images))
                                <img src="/uploads/{{$pfeatured->images[0]->id}}.jpg" alt="" />
                            @else
                                <img src="/images/no-img.jpg">
                            @endif

                            <h2>R$ {{ $pfeatured->price }}</h2>
                            <p>{{ $pfeatured->name }}</p>
                            <a href="/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{ $pfeatured->price }}</h2>
                                <p>{{ $pfeatured->name }}</p>
                                <a href="/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div><!--features_items-->



        <div class="features_items"><!--recommended-->
            <h2 class="title text-center">Recomendados</h2>

	        @foreach($prodsRecommended as $prodRecommended)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">


	                        @if(count($prodRecommended->images))
		                        <img src="/uploads/{{$prodRecommended->images[0]->id}}.jpg" alt="" />
	                        @else
		                        <img src="/images/no-img.jpg">
	                        @endif

                            <h2>R$ {{$prodRecommended->price}}</h2>
                            <p>{{$prodRecommended->name}}</p>
                            <a href="/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>R$ {{$prodRecommended->price}}</h2>
                                <p>{{$prodRecommended->name}}</p>
                                <a href="/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                <a href="/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			@endforeach

        </div><!--recommended-->

    </div>
@endsection
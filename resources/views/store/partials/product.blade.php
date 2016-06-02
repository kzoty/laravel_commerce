@foreach($products as $product)
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">

				@if(count($product->images))
					<img src="/uploads/{{$product->images[0]->id}}.jpg" alt="" />
				@else
					<img src="/images/no-img.jpg">
				@endif

				<h2>R$ {{ $product->price }}</h2>
				<p>{{ $product->name }}</p>
				<a href="/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

				<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
			</div>
			<div class="product-overlay">
				<div class="overlay-content">
					<h2>R$ {{ $product->price }}</h2>
					<p>{{ $product->name }}</p>
					<a href="/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

					<a href="/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@extends('frontend.layouts.app')

@section('content')
	<section>
		<div id="page-title">
			<div class="container clearfix">
				<h1>Carrinho de Orçamento</h1>
				<ol class="breadcrumb">
					<li><a href="{{ route('frontend.index') }}">Início</a></li>
					<li class="active">Carrinho de Orçamento</li>
				</ol>
			</div>
		</div><!-- #page-title end -->

		<div id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="table-responsive bottommargin">
						<table class="table cart">
							{{ Form::open(['route' => 'frontend.cart.checkout.store', 'method' => 'get']) }}
								<thead>
									<tr>
										<th class="cart-product-remove">&nbsp;</th>
										<th class="cart-product-thumbnail">&nbsp;</th>
										<th class="cart-product-name">Animal</th>
										<th class="cart-product-price">Altura</th>
									</tr>
								</thead>
								<tbody>
			                        @forelse(getCartSession()->all() as $id => $item)
										<tr class="cart_item">
											<article>
												<h1 class="font-no-size">{{ $item['name'] }}</h1>
												<td class="cart-product-remove">
													<a href="{{ route('frontend.cart.destroy', $id) }}" class="remove" title="Remova este item"><i class="icon-trash2"></i></a>
												</td>

												<td class="cart-product-thumbnail">
													<a href="{{ route('frontend.product', $id) }}" title="{{ $item['name'] }}"><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"></a>
												</td>

												<td class="cart-product-name">
													<a title="{{ $item['name'] }}" href="{{ route('frontend.product', $id) }}">{{ $item['name'] }}</a>
												</td>

												<td class="cart-product-price">
													<span class="amount">{{ $item['height'] }}</span>
												</td>
												{{ Form::hidden('height', $item['height']) }}
											</article>
										</tr>
			                        @empty
			                            <tr class="center"><td colspan="4"><div class="alert alert-warning" role="alert"><b>Não existe nenhum animal no carrinho de orçamento</b></div></td></tr>
			                        @endforelse

									<tr class="cart_item">
										<td colspan="6">
											<div class="row clearfix">
												<div class="col-md-12 col-xs-12 nopadding">
													<a title="Continuar Pesquisando" href="{{ route('frontend.index') }}" class="button button-3d nomargin fright">Continuar Pesquisando...</a>
													<button type="submit" class="button button-3d button-black notopmargin fright">Fechar Orçamento</button>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							{{ Form::close() }}
						</table>
					</div>
				</div>
			</div>
		</div><!-- #content end -->
	</section>
@endsection
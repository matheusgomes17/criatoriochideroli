@extends('frontend.layouts.app')

@section('content')
<section>
    <div id="page-title">
        <div class="container clearfix">

            <h1>Resultados da Pesquisa</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Pesquisa</li>
            </ol>

        </div>
    </div><!-- #page-title end -->
    <div>
        <div class="container clearfix">

            @if ($search->count() > 0)

            <p style="margin: 30px 0px; font-size: 1.5em">Sua pesquisa por <b><u>{{ $keyword }}</u></b> resultou em {{ $search->count() }} @if ($search->count() == 1) resultado @else resultados @endif</p>
            
            <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">

                @foreach($search as $product)
                    <article class="product clearfix" itemscope itemtype="https://schema.org/Product">
                        <div class="product-image">
                            <a title="{{ $product->name }}" href="{{ route('frontend.product', $product->id) }}" itemprop="url"><img src="{{ $product->getImageUrl('cover') }}" alt="{{ $product->name }}" itemprop="image" /></a>

                            {{ $product->hasSale() }}

                            <div class="product-overlay">
                                <a title="Adicionar ao Carrinho" href="{{ route('frontend.cart.store', $product->id) }}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Adicionar ao Carrinho</span></a>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-title">
                                <h3>
                                    <a title="{{ $product->name }}" href="{{ route('frontend.product', $product->id) }}">
                                        <span itemprop="name">{{ $product->name }}</span>
                                    </a>
                                </h3>
                            </div>
                            <div class="product-price"><ins>Solicite um orçamento</ins></div>
                            <div class="product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                <meta itemprop="ratingValue" content="5" />
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>

            @else
                <article id="aa-product-category">
                    <div class="container">
                        <div class="row" style="margin: 60px 0px;">
                            <h1 class="center">
                                <div class="style-msg alertmsg">
                                    <div class="sb-msg"><i class="icon-warning-sign"></i> Não foram encontrados resultados para <b>{{ $keyword }}</b>.</div>
                                </div>
                            </h1>
                        </div>
                    </div>
                </article>
            @endif

            <div class="clear"></div>
        </div>
    </div>
</section>

@endsection
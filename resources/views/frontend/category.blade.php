@extends('frontend.layouts.app')

@section('content')
<div id="page-title">
    <div class="container clearfix">

        <p>Categoria {{ $category->name }}</p>
        <ol class="breadcrumb">
            <li><a title="Início" href="#">Início</a></li>
            @if (is_null($category->parent))
                <li class="active">{{ $category->name }}</li>
            @else
                <li><a title="{{ $category->parent->name }}" href="{{ route('frontend.category', $category->parent->id) }}">{{ $category->parent->name }}</a></li>
                <li class="active">{{ $category->name }}</li>
            @endif
        </ol>

    </div>
</div><!-- #page-title end -->

<div id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="postcontent nobottommargin col_last">
                <div id="shop" class="shop product-3 clearfix">

                @if ($category->products->count() > 0)
                    @foreach ($products as $product)
                        <article class="product clearfix" itemscope itemtype="https://schema.org/Product">
                            <div class="product-image">
                                <a title="{{ $product->name }}" href="{{ route('frontend.product', $product->id) }}" itemprop="url"><img src="{{ $product->getImageUrl('cover') }}" alt="{{ $product->name }}" itemprop="image" /></a>

                                {!! $product->hasSale() !!}

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
                @elseif (is_null($category->parent))
                    @foreach ($products as $product)
                        <article class="product clearfix" itemscope itemtype="https://schema.org/Product">
                            <div class="product-image">
                                <a title="{{ $product->name }}" href="{{ route('frontend.product', $product->id) }}" itemprop="url"><img src="{{ $product->getImageUrl('cover') }}" alt="{{ $product->name }}"></a>
                                {!! $product->hasSale() !!}
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
                @else
                    Não existem produtos cadastrados nesta categoria!
                @endif

                </div><!-- #shop end -->
            </div><!-- .postcontent end -->

            <div class="sidebar nobottommargin">
                <div class="sidebar-widgets-wrap">
                    <nav class="widget widget_links clearfix">

                        @foreach(getMenuCategories() as $menuCategories)
                            <h4>{{ $menuCategories->name }}</h4>
                            <ul>
                                @foreach($menuCategories->children as $subMenuCategories)
                                <li><h5><a title="{{ $subMenuCategories->name }}" href="{{ route('frontend.category', $subMenuCategories->id) }}">{{ $subMenuCategories->name }}</a></h5></li>
                                @endforeach
                            </ul>
                        @endforeach

                    </nav>

                </div>
            </div><!-- .sidebar end -->
        </div>
    </div>
</div><!-- #content end -->
@endsection
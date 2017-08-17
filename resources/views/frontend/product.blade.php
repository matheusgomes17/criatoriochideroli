@extends('frontend.layouts.app')

@section('content')
<div id="page-title">
    <div class="container clearfix">
        <p>{{ $product->name }}</p>
        <ol class="breadcrumb">
            <li><a title="Início" href="{{ route('frontend.index') }}">Início</a></li>
            <li><a title="{{ $product->categories->name }}" href="{{ route('frontend.category', $product->categories->id) }}">{{ $product->categories->name }}</a></li>
            <li class="active">{{ $product->name }}</li>
        </ol>
    </div>
</div><!-- #page-title end -->

<div id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <section class="single-product" itemscope itemtype="https://schema.org/Product">
                <div class="product">
                    <div class="col_two_fifth">
                        <div class="product-image">
                            <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                <div class="flexslider">
                                    <div class="slider-wrap" data-lightbox="gallery">
                                        <div class="slide" data-thumb="{{ $product->getImageUrl('thumb') }}">
                                            <a href="{{ $product->getImageUrl('cover') }}" title="{{ $product->name }}" data-lightbox="gallery-item">
                                                <img src="{{ $product->getImageUrl('cover') }}" alt="{{ $product->name }}" itemprop="image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! $product->hasSale() !!}
                        </div><!-- Product Single - Gallery End -->
                    </div>

                    <div class="col_two_fifth product-desc">

                        <div class="product-price"><h1><ins itemprop="name">{{ $product->name }}</ins></h1></div>

                        <div class="product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                            <meta itemprop="ratingValue" content="5" />
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                            <i class="icon-star3"></i>
                        </div>

                        <div class="clear"></div>
                        <div class="line"></div>

                        <a title="Adicionar ao Carrinho" href="{{ route('frontend.cart.store', $product->id) }}" class="add-to-cart button nomargin">Adicionar ao Carrinho</a>

                        <div class="clear"></div>
                        <div class="line"></div>

                        <p itemprop="description">{{ $product->description }}</p>

                        <ul class="iconlist">
                            <li><i class="icon-caret-right"></i> Altura: {{ $product->height }}</li>
                            <li><i class="icon-caret-right"></i> Idade: {{ $product->birth_day }}</li>
                        </ul><!-- Product Single - Short Description End -->

                        <div class="panel panel-default product-meta">
                            <div class="panel-body">
                                <span class="sku">{{ $product->categories->parent->name }}</span>
                                <span class="posted_in">Categoria: <a title="{{ $product->categories->name }}" href="{{ route('frontend.category', $product->categories->id) }}"><span itemprop="category">{{ $product->categories->name }}</span></a>.</span>
                            </div>
                        </div><!-- Product Single - Meta End -->

                        <div class="si-share noborder clearfix">
                            <span>Compartilhe:</span>
                            <div>
                                <a title="Compartilhe no Facebook" data-href="{{ route('frontend.product', $product->id) }}" href="#" class="social-icon si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a title="Compartilhe no Google+" href="#" class="social-icon si-borderless si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div><!-- Product Single - Share End -->

                    </div>

                    <div class="col_one_fifth col_last">

                        <a href="#" title="{{ env('APP_NAME') }}" class="hidden-xs">
                          <img class="image_fade" src="/img/frontend/logo.png" alt="{{ env('APP_NAME') }}">
                        </a>

                        <div class="divider divider-center"><i class="icon-circle-blank"></i></div>

                        <article class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-thumbs-up2"></i>
                            </div>
                            <h3>100% Original</h3>
                            <p class="notopmargin">Nós garantimos-lhe a venda de marcas originais.</p>
                        </article>

                        <article class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-credit-cards"></i>
                            </div>
                            <h3>Pagamentos</h3>
                            <p class="notopmargin">Aceitamos Visa, MasterCard e American Express.</p>
                        </article>

                        <article class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-truck2"></i>
                            </div>
                            <h3>Frete Grátis</h3>
                            <p class="notopmargin">Entrega gratuita para mais de 100 locais em pedidos acima de R$ 40.</p>
                        </article>

                    </div>

                    <div class="col_four_fifth nobottommargin">
                        <div class="tabs clearfix nobottommargin" id="tab-1">

                            <ul class="tab-nav clearfix">
                                <li><a title="Informações Adicionais" href="#tabs-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Informações Adicionais</span></a></li>
                            </ul>
                            <div class="tab-container">
                                <div class="tab-content clearfix" id="tabs-2">
                                    <table class="table table-striped table-bordered">
                                        <colgroup>
                                            <col class="col-xs-6">
                                            <col class="col-xs-6">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>Nº Registro</td>
                                                <td itemprop="identifier">{{ $product->code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Altura</td>
                                                <td itemprop="height">{{ $product->height }}</td>
                                            </tr>
                                            @if ($product->color != 0)
                                            <tr>
                                                <td>Cor</td>
                                                <td itemprop="color">{{ $product->color }}</td>
                                            </tr>
                                            @endif
                                            @if ($product->weight != 0)
                                            <tr>
                                                <td>Peso</td>
                                                <td itemprop="weight">{{ $product->weight }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td>Idade</td>
                                                <td itemprop="productionDate">{{ $product->birth_day }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="clear"></div><div class="line"></div>

            <section class="col_full nobottommargin">

                <h4>Produtos Relacionados</h4>

                <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

                    @foreach ($relateds as $related)
                    <article class="oc-item" itemscope itemtype="https://schema.org/Product">
                        <div class="product iproduct clearfix">
                            <div class="product-image">
                                <a title="{{ $related->name }}" href="{{ route('frontend.product', $related->id) }}" itemprop="url"><img src="{{ $related->getImageUrl('cover') }}" alt="{{ $related->name }}" itemprop="image" /></a>

                                {!! $related->hasSale() !!}

                                <div class="product-overlay">
                                    <a title="Adicionar ao Carrinho" href="{{ route('frontend.cart.store', $related->id) }}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Adicionar ao Carrinho</span></a>
                                </div>
                            </div>
                            <div class="product-desc">
                                <div class="product-title">
                                    <h3>
                                        <a title="{{ $related->name }}" href="{{ route('frontend.product', $related->id) }}">
                                            <span itemprop="name">{{ $related->name }}</span>
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
                        </div>
                    </article>
                    @endforeach

                </div>
            </section>
        </div>
    </div>
</div><!-- #content end -->
@endsection

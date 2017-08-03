@extends('frontend.layouts.app')

@section('content')
    <!-- #sliders -->
    <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
        <div class="slider-parallax-inner">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    <article class="swiper-slide dark" style="background-image: url('img/frontend/slider/indiogigante2.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp" style="text-shadow:#000 1px -1px 2px, #000 -1px 1px 2px, #000 1px 1px 2px, #000 -1px -1px 2px">Indio Gigante Chideroli</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200" style="text-shadow:#000 1px -1px 2px, #000 -1px 1px 2px, #000 1px 1px 2px, #000 -1px -1px 2px">Os melhores animais da raça num só lugar! Veja agora os melhores galos indio gigante do Criatório Chideroli. Faça seu orçamento sem compromisso.</p>
                            </div>
                        </div>
                    </article>
                    <article class="swiper-slide dark" style="background-image: url('img/frontend/slider/indiogigante.jpg');">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-caption-animate="fadeInUp">Beautifully Flexible</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                            </div>
                        </div>
                        <div class="video-wrap">
                            <video id="slide-video" poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
                                <source src='images/videos/explore.webm' type='video/webm' />
                                <source src='images/videos/explore.mp4' type='video/mp4' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>
                    </article>
                    <article class="swiper-slide" style="background-image: url('img/frontend/slider/swiper/3.jpg'); background-position: center top;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 data-caption-animate="fadeInUp">Great Performance</h2>
                                <p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
            </div>

            <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
        </div>
    </section>

    <div id="content">
        <div class="content-wrap">
            <article>
                <header class="container clearfix">
                    <div class="row clearfix">

                        <div class="col-lg-5">
                            <div class="heading-block topmargin">
                                <h1>Indio Gigante Chideroli</h1>
                            </div>
                            <p class="lead" style="text-align: justify;">O galo Índio gigante é uma ave rústica, de porte avantajado, que não requer muito cuidado quando adulto. É uma ave ideal para quem deseja melhorar sua criação de aves caipiras, neste caso, os criadores poderão substituir os galos caipiras, por galos Índio gigante.</p>
                        </div>

                        <div class="col-lg-7">

                            <div style="position: relative; margin-bottom: -60px;" class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183">
                                <img src="img/frontend/galo.jpg" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="100" alt="Chrome">
                                <img src="img/frontend/galo.jpg" style="position: absolute; top: 0; left: 0;" data-animate="fadeInUp" data-delay="400" alt="iPad">
                            </div>

                        </div>

                    </div>
                </header>

                <footer class="section nobottommargin">
                    <div class="container clear-bottommargin clearfix">

                        <div class="row topmargin-sm clearfix">

                            <section class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-food inline-block" style="margin-bottom: 15px;"></i>
                                <header class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <h4>Alimentação</h4>
                                </header>
                                <p style="text-align: justify;">Criado à base de boa alimentação, o galo Índio Gigante pode chegar a pesar até seis quilos e medir facilmente mais de 01 metro. A alimentação se dá basicamente através de ração e milho. No criatório Chideroli, toda a alimentação é desenvolvida pela empresa Nutrimuito que é especializada na criação de rações para animais, porém qualquer pessoa pode criar a raça, visto que a alimentação pode facilmente ser encontrada em casas especializadas.</p>
                            </section>

                            <section class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-line2-energy inline-block" style="margin-bottom: 15px;"></i>
                                <header class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <h4>Criação</h4>
                                </header>
                                <p style="text-align: justify;">Forte e dono de boa musculatura, ele tem instinto agressivo, por isso não deve ser criado junto com outro macho da raça após os seis meses de vida. Para ajudar no crescimento da ave, o ideal é que ela tenha uma boa área onde possa andar e se exercitar. Para a procriação das aves, em uma área cercada de cinco metros quadrados, pode ser alojado um terno – um macho para duas fêmeas. A ave, porém, permite que se trabalhe em maior escala de produção (de oito a dez fêmeas por macho), bastando ampliar as instalações.</p>
                            </section>

                            <section class="col-md-4 bottommargin">
                                <i class="i-plain color i-large icon-line2-equalizer inline-block" style="margin-bottom: 15px;"></i>
                                <header class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                    <h4>Vantagens</h4>
                                </header>
                                <p style="text-align: justify;">A raça Índio Gigante é rústica e muito resistente, exigindo poucos cuidados dos criadores, isto faz com que a atividade não necessite de grandes investimentos. A criação doméstica tem a vantagem de oferecer ao produtor um maior controle sobre as aves, assim elas podem ser tratadas de acordo com o desejo de cada criador.</p>
                            </section>

                        </div>

                    </div>
                </footer>
            </article>

            <!-- #products -->

            @if($products->count() > 0)
                <section>
                    <header class="section notopmargin notopborder">
                        <div class="container clearfix">
                            <div class="heading-block center nomargin">
                                <h3>Animais Indio Gigante</h3>
                            </div>
                        </div>
                    </header>
                    <div class="container clearfix">
                        <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">

                        @foreach($products as $product)
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
                        <div class="clear"></div>
                    </div>
                    <a href="{{ route('frontend.category', ['id' => 1]) }}" title="Veja Mais" class="button button-full button-dark center tright bottommargin-lg">
                        <div class="container clearfix">
                            Temos {{ $products->count() }} animais registrados. <strong>Veja Mais</strong> <i class="icon-caret-right" style="top:4px;"></i>
                        </div>
                    </a>
                </section>
            @endif

            <!-- #blog -->
            <section>
                <header class="section notopmargin notopborder">
                    <div class="container clearfix">
                        <div class="heading-block center nomargin">
                            <h3>Últimas postagens do Blog</h3>
                        </div>
                    </div>
                </header>
                <footer class="container clear-bottommargin clearfix">
                    <div class="row">
                        <article class="col-md-3 col-sm-6 bottommargin">
                            <div class="ipost clearfix">
                                <div class="entry-image">
                                    <a title="Bloomberg smart cities; change-makers economic security" href="#"><img class="image_fade" src="images/magazine/thumb/1.jpg" alt="Image"></a>
                                </div>
                                <div class="entry-title">
                                    <h3><a title="Bloomberg smart cities; change-makers economic security" href="blog-single.html">Bloomberg smart cities; change-makers economic security</a></h3>
                                </div>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> 13th Jun 2014</li>
                                    <li><a title="Comentários" href="blog-single.html#comments"><i class="icon-comments"></i> 53</a></li>
                                </ul>
                                <div class="entry-content">
                                    <p>Prevention effect, advocate dialogue rural development lifting people up community civil society. Catalyst, grantees leverage.</p>
                                </div>
                            </div>
                        </article>

                    </div>
                </footer>
            </section>
        </div>
    </div>
@endsection

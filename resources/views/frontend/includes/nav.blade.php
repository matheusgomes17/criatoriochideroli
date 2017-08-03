<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <div id="logo">
                <h1 class="font-no-size">{{ app_name() }}</h1>
                
                <a title="{{ app_name() }}" href="{{ route('frontend.index') }}" class="standard-logo" data-dark-logo="/img/frontend/logo-dark.png"><img src="/img/frontend/logo.png" alt="{{ app_name() }}"></a>
                <a title="{{ app_name() }}" href="{{ route('frontend.index') }}" class="retina-logo" data-dark-logo="/img/frontend/logo-dark@2x.png"><img src="/img/frontend/logo@2x.png" alt="{{ app_name() }}"></a>
            </div><!-- #logo end -->

            <div id="primary-menu">
                <ul>
                    <li class="{{ active_class(Active::checkRoute('frontend.index')) }}"><a title="Início" href="{{ route('frontend.index') }}">Início</a></li>
                    <li class="{{ active_class(Active::checkRoute('frontend.contact.index')) }}"><a title="Contato" href="{{ route('frontend.contact.index') }}">Contato</a></li>
                    <li class="{{ active_class(Active::checkRoute('frontend.about')) }}"><a title="Sobre Nós" href="{{ route('frontend.about') }}">Sobre Nós</a></li>
                    <li class="{{ active_class(Active::checkRoute('frontend.gallery')) }}"><a title="Galeria" href="{{ route('frontend.gallery') }}">Galeria</a></li>
                </ul>

                <ul>
                    @foreach(getMenuCategories() as $menu)

                    <li>
                        <a title="{{ $menu->name }}" href="#">{{ $menu->name }}</a>
                        <ul>
                            @foreach($menu->children as $subMenu)
                            <li><a title="{{ $subMenu->name }}" href="{{ route('frontend.category', $subMenu->id) }}">{{ $subMenu->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    @endforeach
                </ul>

                <ul>
                    @if (! $logged_in_user)
                        <li class="{{ active_class(Active::checkRoute('frontend.auth.login')) }}">
                            <a title="{{ trans('navs.frontend.login') }}" href="{{ route('frontend.auth.login') }}">{{ trans('navs.frontend.login') }}</a>
                        </li>

                        @if (config('access.users.registration'))
                            <li class="{{ active_class(Active::checkRoute('frontend.auth.register')) }}">
                                <a title="{{ trans('navs.frontend.register') }}" href="{{ route('frontend.auth.register') }}">{{ trans('navs.frontend.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#">{{ $logged_in_user->name }}</a>
                            <ul>
                                @permission('view-backend')
                                <li>
                                    <a title="{{ trans('navs.frontend.user.administration') }}" href="{{ route('admin.dashboard') }}">{{ trans('navs.frontend.user.administration') }}</a>
                                </li>
                                @endauth
                                <li class="{{ active_class(Active::checkRoute('frontend.user.account')) }}">
                                    <a title="{{ trans('navs.frontend.user.account') }}" href="{{ route('frontend.user.account') }}">{{ trans('navs.frontend.user.account') }}</a>
                                </li>
                                <li>
                                    <a title="{{ trans('navs.general.logout') }}" href="{{ route('frontend.auth.logout') }}">{{ trans('navs.general.logout') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                
                <div id="top-cart">
                    
                    <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i>
                        @if (! empty(getCartSession()->all()))
                            <span>{{ count(session()->get('cart')->all()) }}</span>
                        @endif
                    </a>
                    
                    <div class="top-cart-content">
                        <div class="top-cart-title">
                            <p>Carrinho de Orçamentos</p>
                        </div>
                        <div class="top-cart-items">

                            @forelse(getCartSession()->all() as $k => $item)
                                <div class="top-cart-item clearfix">
                                    <div class="top-cart-item-image">
                                        <a title="{{ $item['name'] }}" href="{{ route('frontend.product', $k) }}"><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <a title="{{ $item['name'] }}" href="{{ route('frontend.product', $k) }}">{{ $item['name'] }}</a>
                                        <span class="top-cart-item-price">Altura: {{ $item['height'] }}cm</span>
                                    </div>
                                </div>
                            @empty
                                <div class="top-cart-item-desc">
                                    <div class="alert alert-warning"><b>Não existem produtos no carrinho</b></div>
                                </div>
                            @endforelse

                        </div>
                        <div class="top-cart-action clearfix">
                            <a class="button button-3d button-small nomargin fright" href="{{ route('frontend.cart.index') }}">Ver Carrinho</a>
                        </div>
                    </div>
                </div><!-- #top-cart end -->

                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>

                    {{ Form::open(['route' => 'frontend.search', 'method' => 'get']) }}
                        <input type="text" name="search" class="form-control" value="" placeholder="Digite e pressione Enter..">
                    {{ Form::close() }}
                </div><!-- #top-search end -->

            </div><!-- #primary-menu end -->
        </div>
    </div>
</header><!-- #header end -->
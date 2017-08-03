@extends('frontend.layouts.app')

@section('content')
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-sm-9">

                    <img src="{{ $logged_in_user->picture }}" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="{{ $logged_in_user->name }}" style="max-width: 84px;">

                    <div class="heading-block noborder">
                        <h3>{{ $logged_in_user->name }}</h3>
                        <span>{{ $logged_in_user->email }}</span>
                    </div>

                    <div class="clear"></div>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="tabs tabs-alt clearfix">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tab-feeds"><i class="icon-rss2"></i> Feeds</a></li>
                                    <li><a href="#tab-order"><i class="icon-credit-cards"></i> Orçamentos</a></li>
                                    <li><a href="#tab-profile"><i class="icon-user"></i> Perfil</a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tab-feeds">
                                        @include('frontend.user.account.tabs.feed')
                                    </div>

                                    <div class="tab-content clearfix" id="tab-order">
                                        @include('frontend.user.account.tabs.order')
                                    </div>
                                    
                                    <div class="tab-content clearfix" id="tab-profile">
                                        @include('frontend.user.account.tabs.profile')
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="line visible-xs-block"></div>

                <div class="col-sm-3 clearfix">

                    <div class="list-group">
                        <a href="{{ route('frontend.user.account') }}" title="Minha Conta" class="list-group-item clearfix">Minha Conta <i class="icon-user pull-right"></i></a>
                        <a href="{{ route('frontend.auth.logout') }}" title="Sair" class="list-group-item clearfix">Sair <i class="icon-line2-logout pull-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->
@endsection

@section('after-scripts')
<script>
    $(function() { 
        @foreach ($orders as $order)
        $('#print00{{ $order->id }}').click(function(){   
            window.open('{{ route('frontend.user.order.print', $order->id) }}', '_blank');
        });
        @endforeach
    });
</script>
@endsection
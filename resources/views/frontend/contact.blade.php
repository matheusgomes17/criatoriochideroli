@extends('frontend.layouts.app')

@section('content')
    <div id="page-title">
        <div class="container clearfix">

            <p>Contato</p>
            <span>Entre em contato conosco</span>
            <ol class="breadcrumb">
                <li><a title="Início" href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Contato</li>
            </ol>

        </div>
    </div><!-- #page-title end -->

    <section itemscope itemtype="https://schema.org/Place">
        <div itemprop="geo" itemscope itemtype="https://schema.org/GeoCoordinates">
            <h3 class="font-no-size">Encontre agora mesmo o {{ app_name() }}</h3>
            <div id="google-map" class="gmap slider-parallax"></div>
            <meta itemprop="latitude" content="-21.392881" />
            <meta itemprop="longitude" content="-50.202390" />
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="postcontent nobottommargin">

                    <h3>Nos envie um E-mail</h3>

                    <div class="contact-widget">

                        {{ Form::open(['route' => 'frontend.contact.store', 'class' => 'nobottommargin', 'method' => 'post']) }}

                            <div class="col_one_third">
                                <label for="name">Nome <small>*</small></label>
                                <input type="text" id="name" name="name" maxlength="191" required="required" placeholder="Digite seu nome" class="sm-form-control" />
                            </div>

                            <div class="col_one_third">
                                <label for="email">E-mail <small>*</small></label>
                                <input type="email" id="email" name="email" maxlength="191" required="required" placeholder="Digite seu e-mail" class="email sm-form-control" />
                            </div>

                            <div class="col_one_third col_last">
                                <label for="phone">Telefone</label>
                                <input type="text" id="phone" name="phone" maxlength="14" data-mask="(00) 000000000" placeholder="Digite seu telefone com o DDD" class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="subject">Assunto <small>*</small></label>
                                <input type="text" id="subject" maxlength="191" name="subject" required="required" placeholder="Digite um assunto" class="sm-form-control" />
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                <label for="message">Mensagem <small>*</small></label>
                                <textarea class="sm-form-control" id="message" name="message" required="required" rows="6" cols="30" placeholder="Digite sua mensagem"></textarea>
                            </div>

                            <div class="col_full">
                                {{ Form::submit('Enviar Mensagem', ['class' => 'button button-3d nomargin']) }}
                            </div>

                        {{ Form::close() }}
                    </div>
                </div><!-- .postcontent end -->

                <section class="sidebar col_last nobottommargin" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                    <h4><strong>Localização:</strong></h4>
                    <address>
                        <span itemprop="streetAddress">Est. Vicinal Arlindo Pizzo, S/N, KM<br>
                        1,1 Lado Direito, Água Limpa</span><br>
                        <span itemprop="addressLocality">Glicério</span> - <span itemprop="addressRegion">SP</span>, <span itemprop="postalCode">16270-000</span><br>
                        <meta itemprop="addressCountry" content="Brasil">
                    </address>
                    <abbr title="Número do Telefone"><strong>Telefone:</strong></abbr> <span itemprop="telephone">+55 (18) 99777-1101</span><br>
                    <abbr title="Endereço de E-mail"><strong>E-mail:</strong></abbr> <span itemprop="email">criatoriochideroli@gmail.com</span><br>
                    <abbr title="Página no Facebook"><strong>Facebook:</strong></abbr> fb.com/criatoriochideroli

                    <div class="widget noborder notoppadding">

                        <a itemprop="url" href="{{ env('FACEBOOK_SOCIAL_LINK') }}" target="_blank" title="Curta no Facebook" rel="nofollow" class="social-icon si-small si-dark si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a itemprop="url" href="{{ env('TWITTER_SOCIAL_LINK') }}" target="_blank" title="Faça um Twitter!" rel="nofollow" class="social-icon si-small si-dark si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a itemprop="url" href="{{ env('GOOGLEPLUS_SOCIAL_LINK') }}" target="_blank" title="Acesse o Google+" rel="nofollow" class="social-icon si-small si-dark si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                    </div>
                </section><!-- .sidebar end -->
            </div>
        </div>
    </section><!-- #content end -->
@endsection

@section('after-scripts')
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.gmap.js') }}"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDsZ765PL1LDrTJhaz0_UjGQcQCLu4ZGVw"></script>


    <script type="text/javascript">
        $(function() {
            $('#google-map').gMap({

                latitude: "-21.392881",
                longitude: "-50.202390",
                maptype: 'SATELLITE',
                zoom: 19,
                markers: [
                    {
                        latitude: "-21.392881",
                        longitude: "-50.202390",
                    }
                ],
                doubleclickzoom: false,
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: false,
                    streetViewControl: false,
                    overviewMapControl: false
                }
            });

         });
    </script>
@endsection

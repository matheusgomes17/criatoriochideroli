<footer id="footer" class="dark" itemscope itemtype="https://schema.org/Organization">
	<header class="container">
		<!-- Footer Widgets	=========== -->
		<h1 class="font-no-size">Conheça mais sobre o {{ app_name() }}</h1>
		<div class="footer-widgets-wrap clearfix">
			<div class="col_two_third">
				<section class="col_one_third">
					<div class="widget clearfix">

						<h4 class="font-no-size">{{ app_name() }}</h4>

						<img src="/img/frontend/footer-widget-logo.png" alt="{{ app_name() }}" class="footer-logo" itemprop="image">

						<p itemprop="description">
							Temos <strong>os melhore galos e galinhas</strong> de porte <strong>Indio Gigante</strong> em todo estado de <strong>São Paulo</strong>.
						</p>

						<div style="background: url('img/frontend/world-map.png') no-repeat center center; background-size: 100%;">
							<address itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
								<strong>Localização:</strong><br>
								<span itemprop="streetAddress">Est. Vicinal Arlindo Pizzo, S/N, KM 1,1 Lado Direito, Água Limpa</span><br>
								<span itemprop="addressLocality">Glicério</span>,
								<span itemprop="addressRegion">SP</span>
								CEP <span itemprop="postalCode">16270-000</span><br>
							</address>
							<abbr title="Número do Telefone"><strong>Telefone:</strong></abbr> <i class="fa on fa-whatsapp"></i> <span itemprop="telephone">(18) 99777-1101</span><br>
							<abbr title="Endereço de E-mail"><strong>E-mail:</strong></abbr> <span itemprop="email">criatoriochideroli@gmail.com</span><br>
							<abbr title="Pagina no Facebook"><strong>Facebook:</strong></abbr> fb.com/<strong>criatoriochideroli</strong><br>
						</div>

					</div>

				</section>

				<section class="col_one_third">
					<div class="widget widget_links clearfix">

						<h4>Navegação</h4>

						<ul>
							<li><i class="fa fa-angle-double-right"></i> <a title="Início" href="{{ route('frontend.index') }}">Início</a></li>
							<li><i class="fa fa-angle-double-right"></i> <a title="Contato" href="{{ route('frontend.contact.index') }}">Contato</a></li>
							<li><i class="fa fa-angle-double-right"></i> <a title="Sobre Nós" href="{{ route('frontend.about') }}">Sobre Nós</a></li>
							<li><i class="fa fa-angle-double-right"></i> <a title="Galeria" href="{{ route('frontend.gallery') }}">Galeria</a></li>

              @foreach(getMenuCategories() as $navigation)
                <li><b>{{ $navigation->name }}</b></li>
                  @foreach($navigation->children as $subNavigation)
                  	<li><i class="fa fa-angle-double-right"></i> <a title="{{ $subNavigation->name }}" href="{{ route('frontend.category', $subNavigation->id) }}">{{ $subNavigation->name }}</a></li>
                  @endforeach
              @endforeach
						</ul>

					</div>
				</section>

				<section class="col_one_third col_last">
					<div class="widget clearfix">
						<h4>Postagens Recentes</h4>

						<div id="post-list-footer">
							@foreach (getAllPosts() as $footerPost)
							<article class="spost clearfix">
								<div class="entry-c">
									<header class="entry-title">
										<h5><a href="{{ route('frontend.post.show', $footerPost->id) }}">{{ str_limit($footerPost->title, 60) }}</a></h5>
									</header>
									<footer>
										<ul class="entry-meta">
											<li>{{ $footerPost->created_at }}</li>
										</ul>
									</footer>
								</div>
							</article>
							@endforeach
						</div>
					</div>

				</section>
			</div>

			<section class="col_one_third col_last">
				<header class="widget subscribe-widget clearfix">

					<h5><strong>Se inscreva</strong> na nossa newsletter para obter notícias importantes e ofertas incríveis:</h5>
					<div class="widget-subscribe-form-result"></div>

                    {{ Form::open(['route' => 'frontend.newsletter.store', 'method' => 'post', 'class' => 'nobottommargin']) }}
						<div class="input-group divcenter" style="margin-bottom: 5px;">

							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input type="text" name="name" required="required" class="form-control" placeholder="Entre com seu nome">
						</div>
						<div class="input-group divcenter">

							<span class="input-group-addon"><i class="icon-email2"></i></span>
							<input type="email" name="email" required="required" class="form-control" placeholder="Entre com seu E-mail">

							<span class="input-group-btn">
								<button class="btn btn-success" type="submit">Se inscrever</button>
							</span>
						</div>
                    {{ Form::close() }}

				</header>

				<footer class="widget clearfix" style="margin-bottom: -20px;">
					<div class="row">

						<div class="col-md-6 clearfix bottommargin-sm">
							<a href="{{ env('FACEBOOK_SOCIAL_LINK') }}" title="Curtir no Facebook" target="_blank" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
							<a href="{{ env('FACEBOOK_SOCIAL_LINK') }}" title="Curtir no Facebook" target="_blank"><small style="display: block; margin-top: 3px;"><strong>Curtir</strong><br>no Facebook</small></a>
						</div>
						<div class="col-md-6 clearfix">
							<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
								<i class="icon-rss"></i>
								<i class="icon-rss"></i>
							</a>
							<a href="#" title="Se Inscreva para receber RSS"><small style="display: block; margin-top: 3px;"><strong>Se Inscreva</strong><br>para receber RSS</small></a>
						</div>

					</div>
				</footer>
			</section>
		</div><!-- .footer-widgets-wrap end -->
	</header>

	<footer id="copyrights">
		<div class="container clearfix">

			<div class="col_half">
				Copyrights &copy; 2017 Todos Direitos Reservados por {{ app_name() }}<br>
				<div class="copyright-links"><a href="#">Termos de Uso</a> / <a href="#">Políticas de Privacidade</a></div>
			</div>

			<div class="col_half col_last tright">
				<div class="fright clearfix">
					<a href="{{ env('FACEBOOK_SOCIAL_LINK') }}" target="_blank" title="Curta no Facebook" rel="nofollow" class="social-icon si-small si-borderless si-facebook" itemprop="url">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="{{ env('TWITTER_SOCIAL_LINK') }}" target="_blank" title="Faça um Twitter!" rel="nofollow" class="social-icon si-small si-borderless si-twitter" itemprop="url">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="{{ env('GOOGLEPLUS_SOCIAL_LINK') }}" target="_blank" title="Acesse o Google+" rel="nofollow" class="social-icon si-small si-borderless si-gplus" itemprop="url">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

				</div>

				<div class="clear"></div>

				<i class="icon-envelope2"></i> criatoriochideroli@gmail.com <span class="middot">&middot;</span>
				<i class="icon-headphones"></i> +55 (18) 99777-1101 <span class="middot">&middot;</span>
				<i class="icon-skype2"></i> CriatorioChideroli
			</div>

		</div>
	</footer><!-- #copyrights end -->
</footer><!-- #footer end -->

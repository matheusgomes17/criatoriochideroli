@extends('frontend.layouts.app')

@section('content')
    <div id="page-title" class="page-title-parallax page-title-dark" style="padding: 250px 0; background-image: url('images/about/parallax.jpg'); background-size: cover; background-position: center center;" data-stellar-background-ratio="0.4">

        <div class="container clearfix">
            <p>Sobre Nós</p>
            <span>Tudo o que você precisa saber sobre o {{ app_name() }}</span>
            <ol class="breadcrumb">
                <li><a title="Início" href="{{ route('frontend.index') }}">Início</a></li>
                <li class="active">Sobre Nós</li>
            </ol>
        </div>

    </div><!-- #page-title end -->

    <div id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <article class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Por que <span>Nos Escolher</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </article>

                <article class="col_one_third">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>Nossa <span>Missão</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </article>

                <article class="col_one_third col_last">

                    <div class="heading-block fancy-title nobottomborder title-bottom-border">
                        <h4>O Que <span>Nós Fazemos</span>.</h4>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.</p>

                </article>

            </div>

            <section class="row common-height clearfix">

                <div class="col-sm-5 col-padding" style="background: url('images/team/3.jpg') center center no-repeat; background-size: cover;"></div>

                <div class="col-sm-7 col-padding">
                    <div>
                        <div class="heading-block">
                            <span class="before-heading color">Fundador</span>
                            <h3><div class="font-no-size">Conheça mais sobre </div>Junior Chideroli</h3>
                        </div>

                        <div class="row clearfix">

                            <div class="col-md-12">
                                <p>Employment respond committed meaningful fight against oppression social challenges rural legal aid governance. Meaningful work, implementation, process cooperation, campaign inspire.</p>
                                <p>Advancement, promising development John Lennon, our ambitions involvement underprivileged billionaire philanthropy save the world transform. Carbon rights maintain healthcare emergent, implementation inspire social change solve clean water livelihoods.</p>
                                <a title="Curta no Facebook" href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a title="Faça um Twitter!" href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a title="Compartilhe no Google+" href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>

            </section>

            <section class="section footer-stick">

                <h4 class="uppercase center">O que os <span>clientes</span> dizem?</h4>

                <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <article class="slide">
                                <div class="testi-image">
                                    <a title="Steve Jobs" href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
                                    <div class="testi-meta">
                                        <h5 style="margin: 0px">Steve Jobs</h5>
                                        <span>Apple Inc.</span>
                                    </div>
                                </div>
                            </article>
                            <article class="slide">
                                <div class="testi-image">
                                    <a title="Collis Ta'eed" href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                                    <div class="testi-meta">
                                        <h5 style="margin: 0px">Collis Ta'eed</h5>
                                        <span>Envato Inc.</span>
                                    </div>
                                </div>
                            </article>
                            <article class="slide">
                                <div class="testi-image">
                                    <a title="John Doe" href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
                                </div>
                                <div class="testi-content">
                                    <p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
                                    <div class="testi-meta">
                                        <h5 style="margin: 0px">John Doe</h5>
                                        <span>XYZ Inc.</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

            </section>

        </div>

    </div><!-- #content end -->
@endsection
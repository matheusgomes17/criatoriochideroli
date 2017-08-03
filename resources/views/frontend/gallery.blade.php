@extends('frontend.layouts.app')

@section('content')
    <div id="page-title">
        <div class="container clearfix">

            <p>Galeria de Imagens</p>
            <span>Veja as mais lindas imagens de nosso criatório</span>
            <ol class="breadcrumb">
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li class="active">Galeria de Imagens</li>
            </ol>

        </div>
    </div><!-- #page-title end -->

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="col_full nobottommargin clearfix">

                    <h3></h3>

                    <div class="masonry-thumbs col-6" data-big="3" data-lightbox="gallery">

                        @foreach ($galleries->getAll() as $gallery)

                            <a title="{{ $gallery->name }}" href="{{ $gallery->getImageUrl('original') }}" data-lightbox="gallery-item">
                                <img class="image_fade" src="{{ $gallery->getImageUrl('original') }}" alt="{{ $gallery->name }}">
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- #content end -->
@endsection
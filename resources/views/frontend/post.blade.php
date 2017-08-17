@extends('frontend.layouts.app')

@section('content')
<div id="page-title">

  <div class="container clearfix">
    <p>{{ str_limit($post->title, 40) }}</p>
    <ol class="breadcrumb">
      <li><a href="{{ route('frontend.index') }}">Início</a></li>
      <li>Blog</li>
      <li class="active">{{ str_limit($post->title, 20) }}</li>
    </ol>
  </div>

</div><!-- #page-title end -->

<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="single-post nobottommargin">

        <div class="entry clearfix">

          <div class="entry-title">
            <h2>{{ $post->title }}</h2>
          </div><!-- .entry-title end -->

          <ul class="entry-meta clearfix">
            <li><i class="icon-calendar3"></i> {{ $post->created_at }}</li>
            <li><a href="#"><i class="icon-user"></i> {{ $post->users->name }}</a></li>
            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
          </ul><!-- .entry-meta end -->

          <div class="entry-image bottommargin">
            <img src="{{ $post->getImageUrl('post') }}" alt="{{ str_limit($post->title, 50) }}">
          </div><!-- .entry-image end -->

          <div class="entry-content notopmargin">

            {!! $post->body !!}

            <div class="clear"></div>

            <div class="si-share noborder clearfix">
              <span>Compartilhe esta postagem:</span>
              <div>
                <a href="#" class="social-icon si-borderless si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
                <a href="#" class="social-icon si-borderless si-twitter">
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>
                <a href="#" class="social-icon si-borderless si-gplus">
                  <i class="icon-gplus"></i>
                  <i class="icon-gplus"></i>
                </a>
              </div>
            </div><!-- Post Single - Share End -->

          </div>
        </div><!-- .entry end -->

        <div class="line"></div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Postado por <span>{{ $post->users->name }}</span></h3>
          </div>
          <div class="panel-body">
            <div class="author-image">
              <img src="images/author/1.jpg" alt="" class="img-circle">
            </div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad repellendus recusandae blanditiis praesentium vitae ab sint earum voluptate velit beatae alias fugit accusantium laboriosam nisi reiciendis deleniti tenetur molestiae maxime id quaerat consequatur fugiat aliquam laborum nam aliquid. Consectetur, perferendis?
          </div>
        </div><!-- Post Single - Author End -->

        <div class="line"></div>
      </div>
    </div>
  </div>
</section><!-- #content end -->
@endsection

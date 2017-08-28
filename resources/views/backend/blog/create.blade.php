@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.blog.posts.management') . ' | ' . trans('labels.backend.blog.posts.create'))

@section ('after-styles')
	<!-- CK Editor -->
	<link href="{{ asset('css/backend/plugin/wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.blog.posts.management') }}
        <small>{{ trans('labels.backend.blog.posts.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.blog.post.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.blog.posts.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.blog.includes.partials.post-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('title', trans('validation.attributes.backend.blog.posts.title') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blog.posts.title')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('cover', trans('validation.attributes.backend.blog.posts.cover') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('cover') }}
                        <p><small style="color: red;">{{ trans('validation.attributes.backend.blog.posts.cover-info') }}</small></p>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('subtitle', trans('validation.attributes.backend.blog.posts.subtitle') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blog.posts.subtitle')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('body', trans('validation.attributes.backend.blog.posts.body') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('body', null, ['class' => 'form-control textarea', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'placeholder' => trans('validation.attributes.backend.blog.posts.body')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('meta_description', trans('validation.attributes.backend.blog.posts.meta_description') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('meta_description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.blog.posts.meta_description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.blog.post.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section ('after-scripts')
	<!-- CK Editor -->
	<script src="{{ asset('js/backend/plugin/wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>$(function () {	$(".textarea").wysihtml5();	});</script>
@stop

@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.system.galleries.management') . ' | ' . trans('labels.backend.system.galleries.create'))

@section('after-styles')
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.system.galleries.management') }}
        <small>{{ trans('labels.backend.system.galleries.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($gallery, ['route' => ['admin.system.gallery.update', $gallery], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.system.galleries.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.system.includes.partials.gallery-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.system.galleries.name') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.system.galleries.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('image', trans('validation.attributes.backend.system.galleries.image'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('image') }}
                        <p><small style="color: red;">{{ trans('validation.attributes.backend.system.galleries.image-info') }}</small></p>
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.system.gallery.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
@endsection

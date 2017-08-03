@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.products.management') . ' | ' . trans('labels.backend.catalog.products.create'))

@section('after-styles')
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.products.management') }}
        <small>{{ trans('labels.backend.catalog.products.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.catalog.product.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.catalog.products.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.catalog.includes.partials.product-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.catalog.products.name') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('cover', trans('validation.attributes.backend.catalog.products.cover') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('cover') }}
                        <p><small style="color: red;">{{ trans('validation.attributes.backend.catalog.products.cover-info') }}</small></p>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('category_id', trans('validation.attributes.backend.catalog.products.category') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('code', trans('validation.attributes.backend.catalog.products.code'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.code')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('height', trans('validation.attributes.backend.catalog.products.height') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('height', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.height')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('color', trans('validation.attributes.backend.catalog.products.color'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('color', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.color')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('weight', trans('validation.attributes.backend.catalog.products.weight'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('weight', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.weight')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('birthday', trans('validation.attributes.backend.catalog.products.birthday') . '*', ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{ Form::date('birthday', null, ['class' => 'form-control pull-right', 'placeholder' => trans('validation.attributes.backend.catalog.products.birthday')]) }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('sold', trans('validation.attributes.backend.catalog.products.sold'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <div class="checkbox">
                            <label>{{ Form::checkbox('sold') }} Produto Vendido?</label>
                        </div>
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('description', trans('validation.attributes.backend.catalog.products.description') . '*', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.catalog.products.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.catalog.product.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
@endsection

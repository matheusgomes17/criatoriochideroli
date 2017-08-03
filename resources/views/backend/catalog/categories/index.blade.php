@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.categories.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.categories.management') }}
        <small>{{ trans('labels.backend.catalog.categories.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.catalog.categories.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.catalog.includes.partials.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($categories->count() > 0)
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.catalog.categories.table.id') }}</th>
                            <th>{{ trans('labels.backend.catalog.categories.table.name') }}</th>
                            <th>{{ trans('labels.backend.catalog.categories.table.category') }}</th>
                            <th>{{ trans('labels.backend.catalog.categories.table.create') }}</th>
                            <th>{{ trans('labels.backend.catalog.categories.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->category }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tbody><tr><td>Não existem categorias cadastradas.</td></tr></tbody>
                    @endif
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Category') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
@endsection

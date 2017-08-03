@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.products.management') . ' | ' . trans('labels.backend.catalog.products.deactivated'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.products.management') }}
        <small>{{ trans('labels.backend.catalog.products.deactivated') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.catalog.products.deactivated') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.catalog.includes.partials.product-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($products->count() > 0)
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.catalog.products.table.id') }}</th>
                            <th>{{ trans('labels.backend.catalog.products.table.name') }}</th>
                            <th>{{ trans('labels.backend.catalog.products.table.category') }}</th>
                            <th>{{ trans('labels.backend.catalog.products.table.status') }}</th>
                            <th>{{ trans('labels.backend.catalog.products.table.create') }}</th>
                            <th>{{ trans('labels.backend.catalog.products.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{!! $product->status_label !!}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>{!! $product->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tbody><tr><td>Não existem produtos desativados.</td></tr></tbody>
                    @endif
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
@endsection

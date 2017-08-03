@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.orders.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.orders.management') }}
        <small>{{ trans('labels.backend.catalog.orders.pending') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.catalog.orders.pending') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.catalog.includes.partials.order-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($orders->count() > 0)
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.catalog.orders.table.id') }}</th>
                                <th>{{ trans('labels.backend.catalog.orders.table.items') }}</th>
                                <th>{{ trans('labels.backend.catalog.orders.table.user') }}</th>
                                <th>{{ trans('labels.backend.catalog.orders.table.create') }}</th>
                                <th>{{ trans('labels.backend.catalog.orders.table.last_updated') }}</th>
                                <th>{{ trans('labels.general.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>00{{ $order->id }}</td>
                                    <td>{!! $order->list_items !!}</td>
                                    <td>{{ $order->user }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>{!! $order->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tbody><tr><td>Não existem orçamentos cadastrados.</td></tr></tbody>
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
            {!! history()->renderType('Order') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection
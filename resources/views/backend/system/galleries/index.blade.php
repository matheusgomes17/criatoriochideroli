@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.system.galleries.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.system.galleries.management') }}
        <small>Galeria de imagens</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Galeria de imagens</h3>

            <div class="box-tools pull-right">
                @include('backend.system.includes.partials.gallery-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($galleries->count() > 0)
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.system.galleries.table.id') }}</th>
                            <th>{{ trans('labels.backend.system.galleries.table.name') }}</th>
                            <th>{{ trans('labels.backend.system.galleries.table.image') }}</th>
                            <th>{{ trans('labels.backend.system.galleries.table.create') }}</th>
                            <th>{{ trans('labels.backend.system.galleries.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{ $gallery->id }}</td>
                                <td>{{ $gallery->name }}</td>
                                <td>{!! $gallery->picture !!}</td>
                                <td>{{ $gallery->created_at }}</td>
                                <td>{{ $gallery->updated_at }}</td>
                                <td>{!! $gallery->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tbody><tr><td>Não existem imagens cadastradas.</td></tr></tbody>
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
            {!! history()->renderType('Gallery') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
@endsection
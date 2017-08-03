@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.blog.posts.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.blog.posts.management') }}
        <small>{{ trans('labels.backend.blog.posts.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.blog.posts.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.blog.includes.partials.post-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @if ($posts->count() > 0)
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.blog.posts.table.id') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.name') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.category') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.status') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.sold') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.create') }}</th>
                            <th>{{ trans('labels.backend.blog.posts.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{!! $post->status_label !!}</td>
                                <td>{!! $post->sold_label !!}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>{!! $post->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tbody><tr><td>Não existem postagens cadastradas.</td></tr></tbody>
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
            {!! history()->renderType('Post') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
@endsection

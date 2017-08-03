@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.catalog.categories.management') . ' | ' . trans('labels.backend.catalog.categories.deleted'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.catalog.categories.management') }}
        <small>{{ trans('labels.backend.catalog.categories.deleted') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.catalog.categories.deleted') }}</h3>

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
                    <tbody><tr><td>Não existem categorias para serem excluídos permanentemente.</td></tr></tbody>
                    @endif
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    
	<script>
		$(function() {
            $("body").on("click", "a[name='delete_category_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.backend.general.are_you_sure') }}",
                    text: "{{ trans('strings.backend.catalog.categories.delete_category_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });

            $("body").on("click", "a[name='restore_category']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");

                swal({
                    title: "{{ trans('strings.backend.general.are_you_sure') }}",
                    text: "{{ trans('strings.backend.catalog.categories.restore_category_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });
		});
	</script>
@endsection

<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.catalog.category.index', trans('menus.backend.catalog.categories.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.catalog.category.create', trans('menus.backend.catalog.categories.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('admin.catalog.category.deleted', trans('menus.backend.catalog.categories.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.catalog.categories.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.catalog.category.index', trans('menus.backend.catalog.categories.all')) }}</li>
            <li>{{ link_to_route('admin.catalog.category.create', trans('menus.backend.catalog.categories.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('admin.catalog.category.deleted', trans('menus.backend.catalog.categories.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
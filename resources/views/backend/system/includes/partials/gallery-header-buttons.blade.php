<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.system.gallery.index', trans('menus.backend.system.galleries.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.system.gallery.create', trans('menus.backend.system.galleries.create'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.system.galleries.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.system.gallery.index', trans('menus.backend.system.galleries.all')) }}</li>
            <li>{{ link_to_route('admin.system.gallery.create', trans('menus.backend.system.galleries.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
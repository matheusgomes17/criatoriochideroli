<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.blog.post.index', trans('menus.backend.blog.posts.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.blog.post.create', trans('menus.backend.blog.posts.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('admin.blog.post.deactivated', trans('menus.backend.blog.posts.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('admin.blog.post.deleted', trans('menus.backend.blog.posts.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.blog.posts.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.blog.post.index', trans('menus.backend.blog.posts.all')) }}</li>
            <li>{{ link_to_route('admin.blog.post.create', trans('menus.backend.blog.posts.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('admin.blog.post.deactivated', trans('menus.backend.blog.posts.deactivated')) }}</li>
            <li>{{ link_to_route('admin.blog.post.deleted', trans('menus.backend.blog.posts.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>

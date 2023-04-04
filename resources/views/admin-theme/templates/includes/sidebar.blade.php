<!-- Sidebar -->
<div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link
      @if(
        request()->routeIs('admin.dashboard')
      )
        active
      @endif
    ">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Панель керування
        </p>
      </a>
    </li>


    <li class="nav-item">
      <a href="{{route('admin.categories.index')}}" class="nav-link
      @if(
        request()->routeIs('admin.categories.*')
      )
        active
      @endif
    ">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
          Категорії
        </p>
      </a>
    </li>


    <li class="nav-item">
      <a href="{{route('admin.posts.index')}}" class="nav-link
      @if(
        request()->routeIs('admin.posts.*')
      )
        active
      @endif
    ">
        <i class="nav-icon fas fa-file-signature"></i>
        <p>
          Статті
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview @if(request()->routeIs('admin.pages.*')) menu-open @endif ">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-info-circle nav-icon"></i>
          <p>
          Сторінки
          <i class="right fas fa-angle-left"></i>
          </p>
  
        </a>
        <ul class="nav nav-treeview">
          @foreach($pages as $page)
          <li class="nav-item">
            <a rel="alternate" href="{{route('admin.pages.edit', $page->id)}}" class="nav-link

            @if(Route::current()->getName() == 'admin.pages.edit' && Route::current()->parameter('page')->id == $page->id)
              active
            @endif

            ">
              <i class="far nav-icon">↳</i>
              <p>
                {{mb_strimwidth($page->title, 0, 17, "...")}}
              </p>
            </a>
          </li>
          @endforeach
        </ul>
    </li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

</aside>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{URL('/design/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{URL('/design/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

{{--                Dashboard--}}
                <li class="nav-item">
                    <a href="{{route('control_panel')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                {{--                orders--}}
                @can('order-list','order-edit','order-delete')
                    <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            {{__('admin.orders')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('order.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.ALL orders')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('products-list','products-create','products-edit','products-delete')
                {{--                products--}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            {{__('admin.product')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.products')}}</p>
                            </a>
                        </li>

                    </ul>
                    @can('products-create')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add_product')}}</p>
                            </a>
                        </li>

                    </ul>
                    @endcan
                </li>
                @endcan

                {{--                setting--}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{__('admin.setting')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    @can('Categories-list','Categories-create','Categories-edit','Categories-delete')
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categorie.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.categories')}}</p>
                            </a>
                        </li>

                    </ul>
                    @endcan

                    @can('brand-list','brand-create','brand-edit','brand-delete')
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.brands')}}</p>
                            </a>
                        </li>

                    </ul>
                    @endcan
                </li>

                {{--                admins--}}
                @can('admin-list','admin-create','admin-edit','admin-delete')
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            {{__('admin.admins')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.admins_show')}}</p>
                            </a>
                        </li>
                        @can('role-list','role-create','role-edit','role-delete')
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.roles')}}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan


{{--                users--}}
                @can('users-list','users-create','users-edit','users-delete')
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            {{__('admin.Users')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.Users')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @endcan

{{--                site controll--}}
                @can('site_control-list','site_control-create','site_control-edit','site_control-delete')
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            {{__('admin.control')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('banner.index')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home banner</p>
                            </a>
                        </li>
                        @can('Settings')
                        <li class="nav-item">
                            <a href="{{route('setting')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Setting</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
            </ul>



        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>


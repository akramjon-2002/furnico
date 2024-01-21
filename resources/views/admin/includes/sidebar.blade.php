<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.home')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
            </ul>




            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.user.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users-gear"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
            </ul>


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.category.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-bars"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.post.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-signs-post"></i>
                        <p>
                            Post
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.product.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-tag"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.comment.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-tag"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
            </ul>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('backend.cart.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-tag"></i>
                        <p>
                            Carts
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>

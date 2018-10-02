<!-- start: Main Menu -->
<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{route('adminDashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Brand</span><span class="label label-important"> 2 </span></a>
                <ul>
                    <li><a class="submenu" href="{{route('addBrand')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                    <li><a class="submenu" href="{{route('showbrand')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Show Brand</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Category</span><span class="label label-important"> 2 </span></a>
                <ul>
                    <li><a class="submenu" href="{{route('addCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Category</span></a></li>
                    <li><a class="submenu" href="{{route('showCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Show Category</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Sub Category</span><span class="label label-important"> 2 </span></a>
                <ul>
                    <li><a class="submenu" href="{{route('addsubCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Sub Category</span></a></li>
                    <li><a class="submenu" href="{{route('showsubCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Show Sub Category</span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Product</span><span class="label label-important"> 2 </span></a>
                <ul>
                    <li><a class="submenu" href="{{route('addProduct')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Product</span></a></li>
                    <li><a class="submenu" href="{{route('showProduct')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Show Product</span></a></li>
                </ul>
            </li>
            <li><a href="{{route('newOrder')}}"><i class="icon-edit"></i><span class="hidden-tablet"> New Order</span></a></li>

        </ul>
    </div>
</div>
<!-- end: Main Menu -->
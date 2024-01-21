<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                </a>
            </li>
            <li>
                <a href="{{route('analytics')}}">
                    <i class="fa fa-area-chart"></i> <span>آنالیز بازدید</span>
                </a>
            </li>

            <li>
                <a href="{{route('template.index')}}">
                    <i class="fa fa-paint-brush"></i> <span>تنظیمات قالب</span>
                </a>
            </li>
            <li>
                <a href="{{route('instagramPosts.index')}}">
                    <i class="fa fa-instagram"></i> <span>پست های اینستاگرام</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>محصولات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>  محصولات</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> افزودن محصول</a></li>
                    <li><a href="{{route('colors.index')}}"><i class="fa fa-circle-o"></i>رنگ ها</a></li>
                    <li><a href="{{route('sizes.index')}}"><i class="fa fa-circle-o"></i>سایز ها</a></li>
                    <li><a href="{{route('towels.index')}}"><i class="fa fa-circle-o"></i>حوله های خاص</a></li>
{{--                    <li><a href="{{route('special.index')}}"><i class="fa fa-circle-o"></i>تخفیف ویژه</a></li>--}}

                </ul>
            </li>

            <li>
                <a href="{{route('invoices.index')}}">
                    <i class="fa fa-first-order"></i> <span>سفارشات</span>
                </a>
            </li>

            <li>
                <a href="{{route('gifts.index')}}">
                    <i class="fa fa-ticket"></i> <span>کد های تخفیف</span>
                </a>
            </li>


{{--            <li>--}}
{{--                <a href="{{route('campaign')}}">--}}
{{--                    <i class="fa fa-gift"></i> <span>جشنواره ها</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li>
                <a href="{{route('shownewsletter')}}">
                    <i class="fa fa-envelope-o"></i> <span>خبرنامه</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square"></i>
                    <span>بلاگ</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('blog.index')}}"><i class="fa fa-circle-o"></i>  نوشته ها</a></li>
                    <li><a href="{{route('blog.create')}}"><i class="fa fa-circle-o"></i> افزودن نوشته</a></li>
                    <li><a href="{{route('tags.index')}}"><i class="fa fa-circle-o"></i>  تگ ها</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('users.index')}}">
                    <i class="fa fa-users"></i> <span>کاربران</span>
                </a>
            </li>
            <li>
                <a href="{{route('index')}}">
                    <i class="fa fa-backward"></i> <span>بازگشت به سایت</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

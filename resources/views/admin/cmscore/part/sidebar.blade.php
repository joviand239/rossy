<aside class="app-sidebar" id="sidebar">
    <div class="sidebar-header">
        <img class="img-responsive logo-admin" style="padding-top:20px;" src="{{ url('/') }}/assets/admin/image/logo-new.png"/>
        <button type="button" class="sidebar-toggle">
            <i class="fa fa-times"></i>
        </button>
    </div>
    <div class="sidebar-menu">
        <ul class="sidebar-nav">
            <li class="dropdown" >
                <a href="{{ url('/admin/cms/Page') }}">
                    <div class="icon">
                        <i class="fa fa-info" aria-hidden="true"></i>
                    </div>
                    <div class="title">Konten</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="dropdown">
                            <a href="{{ url('/admin/cms/Page') }}">Halaman Informasi</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/admin/cms/Object/WhyGerayBiz') }}">Kenapa Geray Biz</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/admin/cms/Object/FaqList') }}">FAQ List</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/admin/cms/Object/Partner') }}">Partner Geray</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown" >
                <a>
                    <div class="icon">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="title">Pesanan GerayPrint</div>
                </a>
                <div class="dropdown-menu">
                    <ul>
                        <li class="dropdown">
                            <a href="{{ url('/admin/orders/all/CUSTOMER') }}">Pending</a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('/admin/orders/completed/CUSTOMER') }}">Selesai</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>


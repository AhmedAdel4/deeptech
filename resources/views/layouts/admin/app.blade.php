@include('layouts.admin.parts.css')
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  "  data-open="click"
    data-menu="vertical-menu-modern" data-col="">
    @include('layouts.admin.parts.header')
    @include('layouts.admin.parts.menu')
    <!-- BEGIN: Content-->
    <div  class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')

            </div>
        </div>
    </div>
    <!-- END: Content-->




@include('layouts.admin.parts.footer')
@include('layouts.admin.parts.js')
@yield('js')
</body>
<!-- END: Body-->

</html>

<!-- BEGIN: Header-->
<nav  class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a></li>
        </ul>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (app()->getLocale() == 'ar')
                    <i class="flag-icon flag-icon-sa"></i>
                    <span class="selected-language">العربية</span>
                    @else
                    <i class="flag-icon flag-icon-us"></i>
                    <span class="selected-language">English</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{ route('lang', 'ar') }}" data-language="sa"><i class="flag-icon flag-icon-sa"></i>
                        العربية</a>
                    <a class="dropdown-item" href="{{ route('lang', 'en') }}" data-language="us"><i class="flag-icon flag-icon-us"></i> English</a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">
                            {{ auth()->user()->name }}</span>
                        {{-- <span class="user-status">Admin</span> --}}
                    </div>
                    <span class="avatar">

                            <img class="round" src="{{ asset('app-assets/images/logo/Deep Programming logo.png') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span>
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">

                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item"><i class="mr-50" data-feather="power"></i>
                            Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->

<style>
    ul li a {
        font-size: 20px !important;
    }

    /* Custom CSS for RTL */
    #hero-carousel {
        direction: ltr !important;
        /* Keeps the carousel items from reversing direction */
    }
</style>
<header id="header" class="header d-flex align-items-center fixed-top" style="background-color: #062548">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">@lang('lang.home')</a></li>
                <li><a href="#about">@lang('lang.AboutUs')</a></li>
                <li><a href="#services">@lang('lang.Services')</a></li>
                <li><a href="#team">@lang('lang.Team')</a></li>
                <li><a href="#contact">@lang('lang.Contact')</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a href="{{ route('homePage') }}" class="logo d-flex align-items-center">
            <h1 class="sitename ms-2" style="font-family: sans-serif">DEEP TECH</h1>
            @if ($logo && $logo->getLogoImage() != null)
                <img src="{{ $logo->getLogoImage()->original_url }}"
                    srcset="{{ $logo->getLogoImage()->original_url }} 300w, {{ $logo->getLogoImage()->original_url }} 768w, {{ $logo->getLogoImage()->original_url }} 1024w"
                    sizes="(max-width: 600px) 300px, (max-width: 1200px) 768px, 1024px" alt="DEEP TECH Logo"
                    class="img-fluid">
            @else
                <img src="{{ asset('app-assets/images/logo/Deep Programming logo.jpg') }}"
                    srcset="{{ asset('app-assets/images/logo/Deep Programming logo.jpg') }} 300w, {{ asset('app-assets/images/logo/Deep Programming logo.jpg') }} 768w, {{ asset('app-assets/images/logo/Deep Programming logo.jpg') }} 1024w"
                    sizes="(max-width: 600px) 300px, (max-width: 1200px) 768px, 1024px" alt="DEEP TECH Logo"
                    class="img-fluid">
            @endif
        </a>
    </div>
</header>

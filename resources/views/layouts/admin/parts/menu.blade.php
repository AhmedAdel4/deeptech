<!-- BEGIN: Main Menu-->
<style>
    .navbar-header {
        display: flex;
        align-items: center;
        justify-content: center;
        height: auto;
        /* Adjust height based on content */
    }

    .navbar-brand {
        display: block;
        /* Block level for the link */
        max-height: 100px;
        /* Set a max height to control image size */
        width: 100%;
        /* Ensure it takes full width */
        overflow: hidden;
        /* Prevent overflow */
    }

    .responsive-logo {
        max-width: 100%;
        /* Scale the image to fit the container width */
        max-height: 100%;
        /* Scale the image to fit the container height */
        height: auto;
        /* Maintain aspect ratio */
        width: auto;
        /* Maintain aspect ratio */
        display: block;
        /* Ensures no inline spacing */
        margin: auto;
        /* Centers the image */
    }
</style>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('app-assets/images/logo/Deep Programming logo.png') }}" class="responsive-logo"
                        alt="{{ env('APP_NAME') }}">
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">@lang('lang.Statistics')</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('home') }}">
                    <!-- SVG for Home/Dashboard -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7"></path>
                        <path d="M9 22V12H15V22"></path>
                        <path d="M21 22H3"></path>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="Dashboard">@lang('lang.Dashboard')</span>
                </a>
            </li>


        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">@lang('lang.Menu')</span><i
                    data-feather="more-horizontal"></i>
            </li>

            <li
                class="nav-link {{ Route::currentRouteName() == 'carousel.index' || Route::currentRouteName() == 'carousel.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('carousel.index') }}">
                    <!-- SVG for Carousel -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <path d="M9 9l3 3l3-3"></path>
                        <path d="M9 15l3-3l3 3"></path>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="Carousel">@lang('lang.carousels')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'aboutus.index' || Route::currentRouteName() == 'aboutus.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('aboutus.index') }}">
                    <!-- SVG for About Us -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="AboutUs">@lang('lang.AboutUs')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'team.index' || Route::currentRouteName() == 'team.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('team.index') }}">
                    <!-- SVG for Team -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M9 21v-2a4 4 0 0 1 3-3.87"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        <path d="M8 3.13a4 4 0 0 0 0 7.75"></path>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="Team">@lang('lang.Team')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'service.index' || Route::currentRouteName() == 'service.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('service.index') }}">
                    <!-- SVG for Services -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M6 21v-2a4 4 0 0 1 3-3.87"></path>
                        <circle cx="12" cy="5" r="2"></circle>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="Services">@lang('lang.Services')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'contactus.index' || Route::currentRouteName() == 'contactus.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('contactus.index') }}">
                    <!-- SVG for Contact Us -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 10h-7V3"></path>
                        <path d="M3 21h7v-7"></path>
                        <path d="M21 3l-7 7"></path>
                        <path d="M3 3l7 7"></path>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="ContactUs">@lang('lang.ContactUs')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'social_links.index' || Route::currentRouteName() == 'social_links.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('social_links.index') }}">
                    <!-- SVG for Social Links -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M22 12l-4-4v3H7v2h11v3l4-4z"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="SocialLinks">@lang('lang.social_links')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'statistics.index' || Route::currentRouteName() == 'statistics.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('statistics.index') }}">
                    <!-- SVG for Statistics -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="12" y1="20" x2="12" y2="10"></line>
                        <line x1="18" y1="20" x2="18" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="16"></line>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="Statistics">@lang('lang.statistics')</span>
                </a>
            </li>
            <li
                class="nav-link {{ Route::currentRouteName() == 'userMessage.index' || Route::currentRouteName() == 'userMessage.show' ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('userMessage.index') }}">
                    <!-- SVG for User Messages -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H5l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="menu-item text-truncate" data-i18n="UserMessage">@lang('lang.userMessage')</span>
                </a>
            </li>


            <li class="nav-item has-sub">
                <a class="d-flex align-items-center" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-settings">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg>
                    <span class="menu-title text-truncate" data-i18n="User">@lang('lang.Settings')</span>
                </a>
                <ul class="menu-content">
                    {{-- <li
                        class="nav-link {{ Route::currentRouteName() == 'aboutus.index' || Route::currentRouteName() == 'aboutus.show' ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('aboutus.index') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                            </svg>
                            <span class="menu-item text-truncate" data-i18n="User">@lang('lang.AboutUs')</span>
                        </a>
                    </li> --}}



                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->

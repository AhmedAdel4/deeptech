<!DOCTYPE html>
@if (app()->getLocale() == 'ar')
    <html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description"
            content="Deep Tech admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Deep Tech admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Login - Deep Tech </title>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors-rtl.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/colors.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/pages/page-auth.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/custom-rtl.css">
        <!-- END: Custom CSS-->

    </head>
@else
    <html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description"
            content="Deep Tech admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin  with unlimited possibilities.">
        <meta name="keywords" content="admin , Deep Tech admin , dashboard , flat admin , responsive admin , web app">
        <meta name="author" content="PIXINVENT">
        <title>Login - Deep Tech </title>
        @php
            $logo = App\Models\Setting::where('name', 'logo')->first();
        @endphp
        @if ($logo && $logo->getLogoImage() != null)
            <link rel="icon" type="image/x-icon" href="{{ $logo->getLogoImage()->original_url }}">
        @else
            <link rel="icon" type="image/x-icon"
                href="{{ asset('app-assets/images/logo/Deep Programming logo.jpg') }}">
        @endif
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-auth.css">
        <!-- END: Page CSS-->

    </head>
@endif

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl mr-1 fit-content">
        <div class="navbar-container d-flex content">
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle"
                        id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                            class="selected-language">English</span></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="javascript:void(0);" data-language="sa"><i
                                class="flag-icon flag-icon-sa"></i>
                            العربية</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-language="us"><i
                                class="flag-icon flag-icon-us"></i> English</a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li>


            </ul>
        </div>
    </nav>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    @php
                                        $logo = App\Models\Setting::where('name', 'logo')->first();
                                    @endphp
                                    @if ($logo && $logo->getLogoImage() != null)
                                        <img src="{{ app()->getLocale() == 'ar' ? $logo->getLogoImage()->original_url : $logo->getLogoImage()->original_url }}"
                                            width="250" alt="">
                                    @else
                                        <img src="{{ app()->getLocale() == 'ar' ? '/app-assets/images/logo/Deep Programming logo.jpg' : '/app-assets/images/logo/Deep Programming logo.jpg' }}"
                                            width="250" alt="">
                                    @endif

                                </a>

                                <h4 class="card-title mb-1">
                                    {{ trans('lang.Welcome_to_Direct_Tech!') . ' ' . env('APP_NAME') }} 👋</h4>
                                <p class="card-text mb-2">{{ trans('lang.Please sign-in to your account') }}</p>

                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">{{ trans('lang.email') }}</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="text" class="form-control form-control-merge"
                                                id="login-email" name="email" placeholder="john@example.com"
                                                aria-describedby="login-email" tabindex="1" autofocus />

                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">{{ trans('lang.password') }}</label>
                                            <a href="page-auth-forgot-password-v1.html">
                                                <small>{{ trans('lang.Forgot Password?') }}</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge"
                                                id="login-password" name="password" tabindex="2"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="remember-me"
                                                name="remember" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me">
                                                {{ trans('lang.remember_me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block"
                                        tabindex="4">{{ trans('lang.sign_in') }}</button>
                                </form>

                                {{-- <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="page-auth-register-v1.html">
                                        <span>Create an account</span>
                                    </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="javascript:void(0)" class="btn btn-facebook">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-twitter white">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-google">
                                        <i data-feather="mail"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-github">
                                        <i data-feather="github"></i>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>

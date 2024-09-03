<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">Deep Tech</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>{{ $contact->address ?? '' }}</p>
                    <p class="mt-3"><strong>@lang('lang.phone'):</strong> <span>{{ $contact->phone ?? '' }}</span></p>
                    <p><strong>@lang('lang.Email'):</strong> <span>{{ $contact->email ?? '' }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    @foreach ($socialLinks as $platform => $url)
                        @if (!empty($url))
                            <a href="{{ $url }}" target="_blank">
                                <i class="bi bi-{{ $platform }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>

            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4 style="font-size: 20px">@lang('lang.Useful Links')</h4>
                <ul>
                    <li><a href="#hero">@lang('lang.home')</a></li>
                    <li><a href="#about">@lang('lang.AboutUs')</a></li>
                    <li><a href="#services">@lang('lang.Services')</a></li>
                    <li><a href="#team">@lang('lang.Team')</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4 style="font-size: 20px">@lang('lang.Our Services')</h4>
                <ul>
                    @foreach ($services as $service)
                        <li><a href="#">{{ $service->title }}</a></li>
                    @endforeach
                </ul>
            </div>



        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>@lang('lang.Copyright')</span> <strong class="px-1 sitename">{{ env('APP_NAME') }}</strong>
            <span>@lang('lang.All Rights Reserved')</span></p>
        {{-- <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> --}}
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

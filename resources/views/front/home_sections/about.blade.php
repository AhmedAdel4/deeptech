<section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>@lang('lang.AboutUs')</h2>
        {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p class="who-we-are">@lang('lang.AboutUs')</p>
                <h3>{{ $about->main_title ?? '' }}</h3>
                </h3>
                <p class="fst-italic">
                    {!! $about->opening_speech ?? '' !!}
                </p>
                {{-- <ul>
                    <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                            velit.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                            mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul> --}}
                @if ($about)
                    <a href="{{ route('aboutDetails') }}" class="read-more"><span>@lang('lang.Read More')</span><i
                            class="bi bi-arrow-right"></i></a>
                @endif
            </div>

            <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">
                    @if ($about && $about->getMedia('about')->isNotEmpty())
                        <div class="col-lg-6">
                            <img src="{{ $about->getAboutMedia()[0]->getUrl() }}" class="img-fluid"
                                alt="{{ $about->getAboutMedia()[0]->name }}">
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                @foreach ($about->getAboutMedia() as $index => $media)
                                    @if ($index != 0)
                                        <div class="col-lg-12">
                                            <img src="{{ $media->getUrl() }}" class="img-fluid"
                                                alt="{{ $media->name }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <!-- Default Images if no media found -->
                        <div class="col-lg-6">
                            <img src="assets/img/about-company-1.jpg" class="img-fluid" alt="Default Image 1">
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img src="assets/img/about-company-2.jpg" class="img-fluid" alt="Default Image 2">
                                </div>
                                <div class="col-lg-12">
                                    <img src="assets/img/about-company-3.jpg" class="img-fluid" alt="Default Image 3">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

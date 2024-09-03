<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>@lang('lang.Services')</h2>
        {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
    </div><!-- End Section Title -->

    <div class="container">

        @php
            $icons = [
                'bi bi-briefcase',
                'bi bi-card-checklist',
                'bi bi-bar-chart',
                'bi bi-binoculars',
                'bi bi-brightness-high',
                'bi bi-calendar4-week',
            ];
        @endphp
        <div class="row gy-4">
            @foreach ($services as $index => $service)
                @php
                    $randomIcon = $icons[array_rand($icons)];
                @endphp
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="{{ $icons[$index] }} icon flex-shrink-0"></i>
                        <div style="margin-right: 35px">
                            <h4 class="title"><a href="{{ route('serviceDetails', ['service' => $service]) }}"
                                    class="stretched-link">{{ $service['title'] }}</a></h4>
                            <p class="description">{!! $service['description'] !!}</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach
        </div>

    </div>

</section>

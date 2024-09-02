<section id="featured-services" class="featured-services section dark-background">

    <div class="container">

        <div class="row gy-4">

            @php
                $icons = [
                    'bi bi-briefcase',
                    'bi bi-card-checklist',
                    'bi bi-bar-chart'
                ];
            @endphp
            @foreach ($topServices as $index => $service)
                <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="{{ $icons[$index] }}"></i></div>
                    <div style="margin-right: 25px">
                        <h4 class="title">{{ $service->title }}</h4>
                        <p class="description">{!! $service->description !!}</p>
                        <a href="service-details.html" class="readmore stretched-link"><span>@lang('lang.Read More')</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->
            @endforeach
        </div>

    </div>

</section>

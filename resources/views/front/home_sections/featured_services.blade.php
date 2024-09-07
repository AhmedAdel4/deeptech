<section id="featured-services" class="featured-services section dark-background">

    <div class="container">

        <div class="row gy-4">

            @php
                $icons = ['bi bi-cpu', 'bi bi-code-slash', 'bi bi-hdd'];
            @endphp
            @php
                // Calculate the column width based on the number of teams
                $topServicesCount = count($topServices);
                if ($topServicesCount === 1) {
                    $colClass = 'col-lg-12';
                } elseif ($topServicesCount === 2) {
                    $colClass = 'col-lg-6';
                } elseif ($topServicesCount === 3) {
                    $colClass = 'col-lg-4';
                } else {
                    $colClass = 'col-lg-3';
                }
            @endphp
            @foreach ($topServices as $index => $service)
                <div class="{{ $colClass }} col-md-6 service-item d-flex" data-aos="fade-up"
                    style="justify-content: center" data-aos-delay="100">
                    <div class="icon flex-shrink-0"><i class="{{ $icons[$index] }}"></i></div>
                    <div style="margin-right: 25px">
                        <h4 class="title">{{ $service->title }}</h4>
                        <p class="description">{!! $service->description !!}</p>
                        <a href="{{ route('serviceDetails', ['service' => $service]) }} "
                            class="readmore stretched-link"><span>@lang('lang.Read More')</span><i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <!-- End Service Item -->
            @endforeach
        </div>

    </div>

</section>

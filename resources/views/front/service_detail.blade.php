@extends('layouts.front.app')


@section('frontContent')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ $service->getMainImage()->original_url }});">
        <div class="container position-relative">
            <h1>{{ $service->title }}</h1>
            <p>{!! $service->opening_speech !!}</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('homePage') }}">@lang('lang.home')</a></li>
                    <li class="current">@lang('lang.Service Details')</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="services-list">
                        @foreach ($services as $index => $serviceItem)
                            @if ($service->title == $serviceItem->title)
                                <a href="{{ route('serviceDetails', ['service' => $serviceItem]) }}"
                                    class="active">{{ $serviceItem->title }}</a>
                            @else
                                <a
                                    href="{{ route('serviceDetails', ['service' => $serviceItem]) }}">{{ $serviceItem->title }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                    <p>
                        {!! $service->description !!}
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /Service Details Section -->
@endsection

@extends('layouts.front.app')


@section('frontContent')
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade"
     style="
        background-image: url('{{ $about->getMainImage()->original_url }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    ">
    <div class="container position-relative">
        <h1>@lang('lang.AboutUs')</h1>
        <p>{!! $about->opening_speech !!}</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="{{ route('homePage') }}">@lang('lang.home')</a></li>
                <li class="current">@lang('lang.AboutUs')</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->


<!-- Service Details Section -->
<section id="service-details" class="service-details section">

    <div class="container">

        <div class="row gy-4">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                {!! $about->details !!}

            </div>

        </div>

    </div>

</section><!-- /Service Details Section -->

@endsection

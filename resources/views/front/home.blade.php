@extends('layouts.front.app')

@section('frontContent')
    <!-- Hero Section -->
    @include('front.home_sections.carousel')
    <!-- /Hero Section -->

    <!-- Featured Services Section -->
    @include('front.home_sections.featured_services')
    <!-- /Featured Services Section -->

    <!-- About Section -->
    @include('front.home_sections.about')
    <!-- /About Section -->

    <!-- Stats Section -->
    @include('front.home_sections.statistics')
    <!-- /Stats Section -->

    <!-- Services Section -->
    @include('front.home_sections.services')
    <!-- /Services Section -->

    <!-- Team Section -->
    @include('front.home_sections.team')
    <!-- /Team Section -->

    <!-- Team Section -->
    @if (count($partners) > 0)
        @include('front.home_sections.partener_of_success')
    @endif
    <!-- /Team Section -->


    <!-- Contact Section -->
    @include('front.home_sections.contact')
    <!-- /Contact Section -->
@endsection

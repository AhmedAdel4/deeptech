@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="/app-assets/images/elements/decore-left.png" class="congratulations-img-left"
                            alt="card-img-left" />
                        <img src="/app-assets/images/elements/decore-right.png" class="congratulations-img-right"
                            alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">@lang('lang.Welcome') {{ auth()->user()->name }}</h1>
                            {{-- <p class="card-text m-auto w-75">
                                You have done <strong>57.6%</strong> more sales today. Check your new badge
                                in your profile.
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>



        <!-- List DataTable -->

        <!--/ List DataTable -->
    </section>
    <!-- Dashboard Analytics end -->
@endsection

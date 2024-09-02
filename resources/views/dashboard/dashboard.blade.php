@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-6 col-md-12 col-sm-12">
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

            <div class="col-xl-6 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">@lang('lang.Statistics')</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">@lang('lang.Updated 1 month ago')</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">

                            <div class="col-xl-3 col-sm-6 mr-1 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-cast">
                                                <path
                                                    d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6">
                                                </path>
                                                <line x1="2" y1="20" x2="2.01" y2="20"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        {{-- <h4 class="fw-bolder mb-0">{{ $projectCount }}</h4> --}}
                                        <p class="card-text font-small-3 mb-0">@lang('lang.Projects')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mr-1 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-box avatar-icon">
                                                <path
                                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                </path>
                                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                                <line x1="12" y1="22.08" x2="12" y2="12">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        {{-- <h4 class="fw-bolder mb-0">{{ $branchCount }}</h4> --}}
                                        <p class="card-text font-small-3 mb-0">@lang('lang.Branches')</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-sm-6   col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-bold">
                                                <path d="M6 4h8a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path>
                                                <path d="M6 12h9a4 4 0 0 1 4 4 4 4 0 0 1-4 4H6z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        {{-- <h4 class="fw-bolder mb-0">{{ $contactusCount }}</h4> --}}
                                        <p class="card-text font-small-3 mb-0">@lang('lang.ContactUs')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-xl-6 col-sm-6 mr-1 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-cast">
                                                <path
                                                    d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6">
                                                </path>
                                                <line x1="2" y1="20" x2="2.01" y2="20">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        {{-- <h4 class="fw-bolder mb-0">{{ $projectContactCount }}</h4> --}}
                                        <p class="card-text font-small-3 mb-0">@lang('lang.ProjectsContacts')</p>
                                    </div>
                                </div>
                            </div>
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

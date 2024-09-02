@extends('layouts.app')


@section('content')
    <section class="app-user-view">
        <!-- User Card & Plan Starts -->
        @include('includes.messages')
        <div class="row">
            <!-- User Card starts-->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card user-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                <div class="user-avatar-section">
                                    <div class="d-flex justify-content-start">
                                        <img class="img-fluid rounded"
                                            src="{{ $user->getFirstMediaUrl('user') ? $user->getFirstMediaUrl('user') : '/app-assets/images/logo/Logo.jpeg' }}"
                                            height="104" width="104" alt="User avatar" />
                                        <div class="d-flex flex-column ml-1">
                                            <div class="user-info mb-1">
                                                <h4 class="mb-0">{{ $user->userProfile->name }}</h4>
                                                <span class="card-text">{{ $user->email }}</span>
                                            </div>
                                            @can('delete user')
                                                <div class="d-flex flex-wrap">
                                                    {{-- <a href="./app-user-edit.html" class="btn btn-primary">Edit</a> --}}
                                                    @if ($user->id != auth()->user()->id)
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type=" submit"
                                                                class="btn btn-outline-danger ml-1">@lang('lang.Delete')</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 mt-2 mt-xl-0">

                                <div class="user-info-wrapper">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-12 mt-2 mt-xl-0">
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title">
                                                    <i data-feather="user" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Name'):
                                                    </span>
                                                </div>
                                                <p class="card-text mb-0 ml-1"> {{ $user->name }}</p>
                                            </div>
                                            @if ($user->invitationCode)
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Invited By'):
                                                        </span>
                                                    </div>
                                                    <p class="card-text mb-0 ml-1"> <a
                                                            href="{{ route('user.show', $user->invitationCode->user_id) }}">{{ $user->invitationCode->user->userProfile->name }}</a>
                                                    </p>
                                                </div>
                                            @else
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Invited By'):
                                                        </span>
                                                    </div>
                                                    <p class="card-text mb-0 ml-1"> @lang('lang.Manger')</p>
                                                </div>
                                            @endif
                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="check" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Status'):
                                                    </span>
                                                </div>
                                                <p class="card-text mb-0 ml-1">
                                                    {{ $user->is_active ? trans('lang.Active') : trans('lang.Not Active') }}
                                                </p>
                                            </div>
                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="star" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Role'):
                                                    </span>
                                                </div>
                                                <p class="card-text mb-0 ml-1">
                                                    {{ $user->roles->first() ? (app()->getLocale() == 'ar' ? $user->roles->first()->name_ar : ucfirst($user->roles->first()->name)) : '' }}
                                                    @can('assign role to user')
                                                        @if ($user->id != auth()->user()->id)
                                                            <a href="#" class="btn-sm btn btn-warning"
                                                                id="edit-role">@lang('lang.Edit')</a>
                                                            <select name="role"
                                                                style="background: #ebefeb; {{ app()->getLocale() == 'ar' ? 'margin-right: -223px;' : 'margin-left: -223px;' }} "
                                                                class="form-control d-none" id="role-edit"
                                                                data-href="{{ route('user.change-role', $user->id) }}">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}"
                                                                        {{ $user->roles->first() ? ($user->roles->first()->id == $role->id ? 'selected' : '') : '' }}>
                                                                        {{ app()->getLocale() == 'ar' ? $role->name_ar : $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    @endcan
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-12 mt-2 mt-xl-0">

                                            <div class="d-flex flex-wrap my-50">
                                                <div class="user-info-title">
                                                    <i data-feather="flag" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Country'):
                                                    </span>
                                                </div>
                                                <p class="card-text mb-0 ml-1"> {{ $user->userProfile->country->name }}</p>
                                            </div>
                                            @if ($user->nationality)
                                                <div class="d-flex flex-wrap my-50">
                                                    <div class="user-info-title">
                                                        <i data-feather="flag" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Nationality'):
                                                        </span>
                                                    </div>
                                                    <p class="card-text mb-0 ml-1"> {{ $user->nationality }}</p>
                                                </div>
                                            @endif
                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title">
                                                    <i data-feather="phone" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Contact'):
                                                    </span>
                                                </div>
                                                <p class="card-text mb-0 ml-1"> {{ $user->mobile_number }}</p>
                                            </div>
                                            @if ($user->other_mobile_number)
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span
                                                            class="card-text user-info-title font-weight-bold mb-0">@lang('lang.OtherContact'):
                                                        </span>
                                                    </div>
                                                    <p class="card-text mb-0 ml-1"> {{ $user->other_mobile_number }}</p>
                                                </div>
                                            @endif


                                            <div class="d-flex flex-wrap">
                                                <div class="user-info-title">
                                                    <i data-feather="star" class="mr-1"></i>
                                                    <span
                                                        class="card-text user-info-title font-weight-bold mb-0">@lang('lang.Ambassador'):
                                                    </span>
                                                </div>

                                                <p class="card-text mb-0 ml-1">
                                                    {{ $user->isAmbassador ? Lang::get('lang.True') : Lang::get('lang.False') }}
                                                    @can('change ambassador state')
                                                        @if ($user->id != auth()->user()->id)
                                                            <a href="#" class="btn-sm btn btn-warning"
                                                                id="edit-ambassador">@lang('lang.Edit')</a>
                                                            <select name="Ambassador"
                                                                style="background: #ebefeb; {{ app()->getLocale() == 'ar' ? 'margin-right: -223px;' : 'margin-left: -223px;' }} "
                                                                class="form-control d-none" id="ambassador-edit"
                                                                data-href="{{ route('user.changeAmbassador', $user->id) }}">
                                                                <option value="0"
                                                                    {{ $user->isAmbassador ? 'selected' : '' }}>
                                                                    @lang('lang.False')
                                                                </option>
                                                                <option value="1"
                                                                    {{ $user->isAmbassador ? 'selected' : '' }}>
                                                                    @lang('lang.True')
                                                                </option>
                                                            </select>
                                                        @endif
                                                    @endcan
                                                </p>
                                            </div>

                                            @if ($user->roles->first())
                                                @if ($user->roles->first()->name == 'consultor')
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="slack" class="mr-1"></i>
                                                            <span
                                                                class="card-text user-info-title font-weight-bold mb-0">@lang('lang.ConsultsNum'):
                                                            </span>
                                                        </div>
                                                        <p class="card-text mb-0 ml-1"> {{ count($user->myConsults) }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                            @if ($user->roles->first())
                                                @if (auth()->user()->id == $user->id && $user->roles->first()->name == 'consultor')
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="slack" class="mr-1"></i>
                                                            <span
                                                                class="card-text user-info-title font-weight-bold mb-0">@lang('lang.UnansweredConsultsNum'):
                                                            </span>
                                                        </div>
                                                        <p class="card-text mb-0 ml-1">
                                                            {{ count($user->UnansweredConsultsOfConsulter) }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                            @if (($user->roles->first() && $user->roles->first()->name != 'consultor') || !$user->roles->first())
                                                @if (count($user->consults) > 0)
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="slack" class="mr-1"></i>
                                                            <span
                                                                class="card-text user-info-title font-weight-bold mb-0">@lang('lang.ConsultsNum'):
                                                            </span>
                                                        </div>
                                                        <p class="card-text mb-0 ml-1"> {{ count($user->consults) }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                            @if (($user->roles->first() && $user->roles->first()->name != 'consultor') || !$user->roles->first())
                                                @if (count($user->UnansweredConsults) > 0)
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="slack" class="mr-1"></i>
                                                            <span
                                                                class="card-text user-info-title font-weight-bold mb-0">@lang('lang.UnansweredConsultsNum'):
                                                            </span>
                                                        </div>
                                                        <p class="card-text mb-0 ml-1">
                                                            {{ count($user->UnansweredConsults) }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card Ends-->
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-post-tab" data-toggle="pill" data-target="#v-pills-post"
                        type="button" role="tab" aria-controls="v-pills-post"
                        aria-selected="true">@lang('lang.Posts')</button>
                    <button class="nav-link" id="v-pills-lecture-tab" data-toggle="pill" data-target="#v-pills-lecture"
                        type="button" role="tab" aria-controls="v-pills-lecture"
                        aria-selected="false">@lang('lang.Lectures')</button>
                    <button class="nav-link" id="v-pills-blog-tab" data-toggle="pill" data-target="#v-pills-blog"
                        type="button" role="tab" aria-controls="v-pills-blog"
                        aria-selected="false">@lang('lang.Blogs')</button>
                    <button class="nav-link" id="v-pills-meetings-tab" data-toggle="pill"
                        data-target="#v-pills-meetings" type="button" role="tab" aria-controls="v-pills-meetings"
                        aria-selected="false">@lang('lang.Meetings')</button>
                    <button class="nav-link" id="v-pills-events-tab" data-toggle="pill" data-target="#v-pills-events"
                        type="button" role="tab" aria-controls="v-pills-events"
                        aria-selected="false">@lang('lang.Events')</button>
                    @if ($user->curriculumVitae)
                        <button class="nav-link" id="v-pills-cv-tab" data-toggle="pill" data-target="#v-pills-cv"
                            type="button" role="tab" aria-controls="v-pills-cv"
                            aria-selected="false">@lang('lang.Curriculum Vitae')</button>
                    @endif
                    @if ($user->roles->first())
                        @if ($user->roles->first()->name == 'consultor' && auth()->user()->id == $user->id)
                            <button class="nav-link" id="v-pills-questions-tab" data-toggle="pill"
                                data-target="#v-pills-questions" type="button" role="tab"
                                aria-controls="v-pills-questions" aria-selected="false">@lang('lang.Questions')
                            </button>
                            <button class="nav-link" id="v-pills-language-tab" data-toggle="pill"
                                data-target="#v-pills-language" type="button" role="tab"
                                aria-controls="v-pills-language" aria-selected="false">@lang('lang.Languages')
                            </button>
                            <button class="nav-link" id="v-pills-AvailableTime-tab" data-toggle="pill"
                                data-target="#v-pills-AvailableTime" type="button" role="tab"
                                aria-controls="v-pills-AvailableTime" aria-selected="false">@lang('lang.AvailableTime')
                            </button>
                        @endif
                    @endif
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-AvailableTime" role="tabpanel"
                        aria-labelledby="v-pills-AvailableTime-tab">
                        <form action="{{ route('consult.store-AvailableTime') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 mt-3">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="FromAvailableTime">@lang('lang.From')</label>
                                        <div class='input-group date'>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input type="datetime-local" value="{{ old('FromAvailableTime') }}"
                                                name="FromAvailableTime" class="form-control float-right"
                                                id="FromAvailableTime">
                                        </div>
                                        @error('FromAvailableTime')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="ToAvailableTime">@lang('lang.To')</label>
                                        <div class='input-group date'>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input type="datetime-local" value="{{ old('ToAvailableTime') }}"
                                                name="ToAvailableTime" class="form-control float-right"
                                                id="ToAvailableTime">
                                        </div>
                                        @error('ToAvailableTime')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group" style="margin: auto">
                                    <div class="col-md-4 col-sm-12">
                                        <button type="submit" class="btn btn-success"
                                            id="btn-submit">{{ $user->consulterAvailableTime ? Lang::get('lang.update') : Lang::get('lang.Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>


                        @if ($user->consulterAvailableTime)
                            <div class="row ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.AvailableTime')</h4>
                                        </div>
                                        <div class="card-body">

                                            <span class="timeline-point timeline-point-indicator"></span>
                                            <div class="timeline-event">
                                                <p>
                                                <h6> @lang('lang.From') : {{ $user->consulterAvailableTime->from }} </h6>
                                                </p>
                                                <br>
                                                <p>
                                                <h6> @lang('lang.To') : {{ $user->consulterAvailableTime->to }} </h6>
                                                </p>
                                                <div class="m-auto">
                                                    <form
                                                        action="{{ route('AvailableTime.destroy', [$user->consulterAvailableTime->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="dropdown-item btn btn-danger justify-content-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash mr-50">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                            <span>@lang('lang.Delete')</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.NoDataFound')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-language" role="tabpanel"
                        aria-labelledby="v-pills-language-tab">
                        <form action="{{ route('consult.store-language') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 mt-3">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="language">@lang('lang.addlanguage')</label>
                                        <select name="language" class="form-control" id="language-edit">
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}">
                                                    {{ app()->getLocale() == 'ar' ? $language->NameAr : $language->NameEn }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('language')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group" style="margin: auto">
                                    <div class="col-md-4 col-sm-12">
                                        <button type="submit" class="btn btn-success"
                                            id="btn-submit">@lang('lang.Save')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if (count($user->consulterLanguages))
                            <div class="row ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Languages')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->consulterLanguages as $k => $consulterLanguage)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6> {{ app()->getLocale() == 'ar' ? $consulterLanguage->NameAr : $consulterLanguage->NameEn }}
                                                                </h6>
                                                                <div class="m-auto">
                                                                    <form
                                                                        action="{{ route('consulterLanguage.destroy', [$consulterLanguage->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item btn btn-danger">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="14" height="14"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash mr-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                            <span>@lang('lang.Delete')</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($consulterLanguage->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Languages')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-questions" role="tabpanel"
                        aria-labelledby="v-pills-questions-tab">
                        <form action="{{ route('consult.store-question') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3 mt-3">
                                <div class="col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="question">@lang('lang.addQuestion')</label>
                                        <input type="text" name="question" class="form-control"
                                            value="{{ old('question') }}">
                                        @error('question')
                                            <div class="text-danger">*{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group" style="margin: auto">
                                    <div class="col-md-4 col-sm-12">
                                        <button type="submit" class="btn btn-success"
                                            id="btn-submit">@lang('lang.Save')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @if (count($user->consulterQuestons))
                            <div class="row ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Questions')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->consulterQuestons as $k => $question)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $question->question }}</h6>
                                                                <div class="m-auto">
                                                                    <form
                                                                        action="{{ route('Question.destroy', [$question->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="dropdown-item btn btn-danger">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="14" height="14"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                class="feather feather-trash mr-50">
                                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                                </path>
                                                                            </svg>
                                                                            <span>@lang('lang.Delete')</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($question->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Question')
                        @endif
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-post" role="tabpanel"
                        aria-labelledby="v-pills-post-tab">
                        @if (count($user->posts))
                            <div class="row  ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Posts')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->posts as $k => $item)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $item->title }}</h6>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                            <p>{!! $item->body !!}</p>
                                                            @if ($item->getFirstMediaUrl('post'))
                                                                <img src="{{ $item->getFirstMediaUrl('post') }}"
                                                                    alt="" class="w-100">
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Posts')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-lecture" role="tabpanel"
                        aria-labelledby="v-pills-lecture-tab">
                        @if (count($user->lectures))
                            <div class="row ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Lectures')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->lectures as $k => $item)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $item->title }}</h6>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                            <p>@lang('lang.Type'): {{ $item->type }}</p>
                                                            @if ($item->link)
                                                                <p>@lang('lang.Link'): <a href="{{ $item->link }}"
                                                                        target="_blank">{{ $item->link }}</a></p>
                                                            @endif
                                                            <p>@lang('lang.Tags'):</p>
                                                            <div class="btn-group">
                                                                @foreach ($item->tags as $tag)
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-link">{{ $tag->name }}</button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Lectures')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                        @if (count($user->blogs))
                            <div class="row  ">
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Blogs')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->blogs as $k => $item)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $item->title }}</h6>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                            <p>{!! $item->body !!}</p>
                                                            @if ($item->getFirstMediaUrl('blog'))
                                                                <img src="{{ $item->getFirstMediaUrl('blog') }}"
                                                                    alt="" class="w-100">
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Blogs')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-meetings" role="tabpanel"
                        aria-labelledby="v-pills-meetings-tab">
                        @if (count($user->meetings))
                            <!-- User Timeline & Permissions Starts -->
                            <div class="row">
                                <!-- information starts -->
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Meetings')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->meetings as $k => $item)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $item->title }}</h6>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($item->created_at)->format('Y/m/d') }}</span>
                                                            </div>
                                                            <p>{!! $item->details !!}</p>
                                                            @if ($item->getFirstMediaUrl('meeting'))
                                                                <a href="{{ $item->getFirstMediaUrl('meeting') }}"
                                                                    target="_blank">{{ $item->getFirstMedia('meeting')->name }}</a>
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Meetings')
                        @endif
                    </div>
                    <div class="tab-pane fade" id="v-pills-events" role="tabpanel" aria-labelledby="v-pills-events-tab">
                        @if (count($user->publicEvents))
                            <!-- User Timeline & Permissions Starts -->
                            <div class="row justify-content-center">
                                <!-- information starts -->
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Events')</h4>
                                        </div>
                                        <div class="card-body">
                                            <ul class="timeline">
                                                @foreach ($user->publicEvents as $k => $item)
                                                    <li class="timeline-item {{ $k != 0 ? 'mt-2' : '' }}">
                                                        <span class="timeline-point timeline-point-indicator"></span>
                                                        <div class="timeline-event">
                                                            <div
                                                                class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                                <h6>{{ $item->title }}</h6>
                                                                <span
                                                                    class="timeline-event-time">{{ Carbon\Carbon::parse($item->date)->format('Y/m/d') }}</span>
                                                            </div>
                                                            <p>{!! $item->description !!}</p>
                                                        </div>
                                                    </li>
                                                    <hr>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            @lang('lang.No More Events')
                        @endif
                    </div>
                    @if ($user->curriculumVitae)
                        <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab">
                            <!-- User Timeline & Permissions Starts -->
                            <div class="row justify-content-center">
                                <!-- information starts -->
                                <div class="col-md-8" style="max-height: 500px; overflow-y:auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-2">@lang('lang.Curriculum Vitae')</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline-event">
                                                <div
                                                    class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                    <h3>{!! $user->curriculumVitae->curriculum_vitae !!}</h3>
                                                </div>
                                                <p>@lang('lang.Tags'):</p>
                                                <div class="btn-group">
                                                    @foreach ($user->curriculumVitae->tags as $item)
                                                        <button type="button"
                                                            class="btn btn-link">{{ $item->name }}</button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).on('click', '#edit-role', function() {
            $(this).addClass('d-none');
            $('#role-edit').removeClass('d-none')
        });
        $(document).on('click', '#edit-ambassador', function() {
            $(this).addClass('d-none');
            $('#ambassador-edit').removeClass('d-none')
        });
    </script>
    <script>
        $(document).on('change', '#role-edit', function() {
            let url = $(this).data('href');
            let roleId = $(this).val();
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    role_id: roleId
                },
                success: function(res) {
                    location.reload();
                }
            });
        });

        $(document).on('change', '#ambassador-edit', function() {
            let url = $(this).data('href');
            let isAmbassador = $(this).val();
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    isAmbassador: isAmbassador
                },
                success: function(res) {
                    location.reload();
                }
            });
        });
    </script>
@endsection

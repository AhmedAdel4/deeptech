@extends('layouts.app')


@section('content')
@include('includes.messages')
    <!-- users list start -->
    <section class="app-user-list">
        @can('create user')
            <div class="mb-2">
                <a class="btn btn-success" href="{{ route('user.create') }}">@lang('lang.Add User')</a>
            </div>
        @endcan
        <!-- users filter start -->
        <!-- <div class="card">
                            <h5 class="card-header">Search Filter</h5>
                            <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                                <div class="col-md-4 user_role"></div>
                                <div class="col-md-4 user_plan"></div>
                                <div class="col-md-4 user_status"></div>
                            </div>
                        </div> -->
        <!-- users filter end -->
        <!-- list section start -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="table  table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('lang.Name')</th>
                            <th>@lang('lang.Email')</th>
                            <th>@lang('lang.Profile Picture')</th>
                            <th>@lang('lang.Status')</th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $item->userProfile->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top"
                                        title="" class="avatar pull-up my-0"
                                        data-original-title="{{ $item->userProfile->name }}">
                                        <img src="{{ $item->getFirstMediaUrl('user') ? $item->getFirstMediaUrl('user') : '/app-assets/images/logo/Logo.jpeg' }}"
                                            alt="Avatar" height="26" width="26">
                                    </div>
                                </td>
                                <td>
                                    @can('active user')
                                        <select name="active" id="avtive" class="form-control active"
                                            data-href="{{ route('user.change-status', $item->id) }}">
                                            <option value="0" {{ !$item->is_active ? 'selected' : '' }}>@lang('lang.Not Active')</option>
                                            <option value="1" {{ $item->is_active ? 'selected' : '' }}>@lang('lang.Active')</option>
                                        </select>
                                    @else
                                        @if ($item->is_active)
                                            <span class="text-success">
                                                <i class="fa-solid fa-circle-check"></i>
                                            </span>
                                        @else
                                            <span class="text-danger">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </span>
                                        @endif
                                    @endcan
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light"
                                            data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('user.show', $item->id) }}">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> --}}
                                                <i class="fa-solid fa-user"></i>
                                                <span>@lang('lang.Profile')</span>
                                            </a>
                                            @can('delete user')
                                                @if (auth()->user()->id != $item->id)
                                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" href="javascript:void(0);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-trash mr-50">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                            </svg>
                                                            <span>@lang('lang.Delete')</span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        {{ $users->links('pagination::bootstrap-4') }}
        <!-- list section end -->
    </section>
    <!-- users list ends -->
@endsection
@section('js')
    <script>
        $(document).on('change', '.active', function() {
            let url = $(this).data('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(res) {
                    alert('done');
                }
            });
        });
    </script>
@endsection
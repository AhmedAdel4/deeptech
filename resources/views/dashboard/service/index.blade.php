@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')

    <!-- users list start -->
    <section class="app-user-list">
        <div class="mb-2">
            <a class="btn btn-success" href="{{ route('service.create') }}">
                @lang('lang.Add') @lang('lang.Services')
            </a>
        </div>

        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example1" class="table mb-3 table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('lang.Title')</th>
                            <th>@lang('lang.Description')</th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $service->title }}</td>
                                <td>{!! $service->opening_speech !!}</td>
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
                                            <a class="dropdown-item edit-button" href="{{ route('service.edit',['service' => $service]) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 mr-50">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                <span>@lang('lang.Edit')</span>
                                            </a>

                                            <form action="{{ route('service.destroy', ['service' => $service]) }}"
                                                class="mb-3" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $services->links('pagination::bootstrap-4') }}
    </section>
    <!-- users list ends -->
@endsection

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": true,
                "scrollX": true
            });
        });
    </script>
@endsection

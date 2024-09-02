@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')

    <!-- users list start -->
    <section class="app-user-list">
        <div class="mb-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#addTeamModal">
                @lang('lang.Add') @lang('lang.Team')
            </button>
        </div>

        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table id="example1" class="table mb-3 table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('lang.name')</th>
                            <th>@lang('lang.Role')</th>
                            <th>@lang('lang.MainImage')</th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->role }}</td>
                                <td>
                                    @if ($team->getFirstMediaUrl('team'))
                                        <a href="{{ $team->getFirstMediaUrl('team') }}"
                                            target="_blank">{{ $team->getFirstMedia('team')->name }}</a>
                                    @endif
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
                                            <a class="dropdown-item edit-button" href="#"
                                                data-id="{{ $team->id }}" data-toggle="modal"
                                                data-target="#editTeamModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 mr-50">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                <span>@lang('lang.Edit')</span>
                                            </a>

                                            <form action="{{ route('team.destroy', ['team' => $team]) }}" class="mb-3"
                                                method="POST">
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
        {{ $teams->links('pagination::bootstrap-4') }}
    </section>
    <!-- users list ends -->

    <!-- Add team Modal -->
    <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeamModalLabel">@lang('lang.Add') @lang('lang.Team')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields for adding a team -->
                        <div class="form-group">
                            <label for="name">@lang('lang.name')</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">@lang('lang.role')</label>
                            <input type="text" name="role" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="main_image">@lang('lang.MainImage')</label>
                            <input type="file" name="main_image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit team Modal -->
    <div class="modal fade" id="editTeamModal" tabindex="-1" aria-labelledby="editTeamModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editTeamForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTeamModalLabel">@lang('lang.Edit') @lang('lang.Team')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form fields for editing a team -->
                        <div class="form-group">
                            <label for="edit_name">@lang('lang.MainTitle')</label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_role">@lang('lang.text')</label>
                            <textarea name="role" id="edit_role" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_main_image">@lang('lang.MainImage')</label>
                            <input type="file" name="main_image" id="edit_main_image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('lang.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

            // Edit button click event
            $('.edit-button').on('click', function() {
                var teamId = $(this).data('id');
                var url = '{{ route('team.edit', ':id') }}';
                url = url.replace(':id', teamId);
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        var url = '{{ route('team.update', ':id') }}';
                        url = url.replace(':id', teamId);
                        $('#editTeamForm').attr('action', url);
                        $('#edit_name').val(response.name);
                        $('#edit_role').val(response.role);
                    }
                });
            });
        });
    </script>
@endsection

@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')
    <section class="app-user-list">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mb-2" >
                <div class="row">
                    <div class="col-md-6">
                        <label for="contacted">@lang('lang.Contacted')</label>
                        <input type="radio" id="contacted">
                    </div>
                    <div class="col-md-6">
                        <label for="general">@lang('lang.General')</label>
                        <input type="radio" id="general" checked>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div id="contactedGrid" hidden >
            <div class="card" >
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('lang.Name')</th>
                                <th>@lang('lang.Email')</th>
                                <th>@lang('lang.phone')</th>
                                <th>@lang('lang.subject')</th>
                                <th>@lang('lang.Message')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactedData as $key => $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $contactedData->links('pagination::bootstrap-4') }}
        </div>

        <div id="generalGrid">
            <div class="card" >
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('lang.Name')</th>
                                <th>@lang('lang.Email')</th>
                                <th>@lang('lang.Mobile Number')</th>
                                <th>@lang('lang.subject')</th>
                                <th>@lang('lang.Message')</th>
                                <th>@lang('lang.Contacted')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactUsData as $key => $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('userMessage.Contacted', $item->id) }}">@lang('lang.Contacted')<span
                                            class="glyphicon glyphicon-edit"></span></a>
                                    </td>
                                    {{-- <td>{{ $item->Contacted? Lang::get('lang.True') : Lang::get('lang.False') }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $contactUsData->links('pagination::bootstrap-4') }}
        </div>

    </section>
@endsection

@section('js')

<script>
    $('#contacted').click(function (e) {
        $("#general").prop("checked", false);
        $('#contactedGrid').attr("hidden",false);
        $('#generalGrid').attr("hidden",true);
    });
    $('#general').click(function (e) {
        $("#contacted").prop("checked", false);
        $('#contactedGrid').attr("hidden",true);
        $('#generalGrid').attr("hidden",false);
    });
</script>

@endsection

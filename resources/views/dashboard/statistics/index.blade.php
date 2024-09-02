@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')

    <form action="{{ route('statistics.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="container">
                @csrf
                <div class="row mb-3 mt-3">
                    @php
                        $titles = ['workers', 'hours_of_support', 'projects', 'clients'];
                    @endphp
                    @foreach ($titles as $title)
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="{{ $title }}">@lang('lang.' . $title)</label>
                                <input type="number" min="1" name="{{ $title }}" class="form-control"
                                    value="{{ $statistics[$title] ?? old($title) }}">
                                @error($title)
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" id="btn-submit">@lang('lang.Save')</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

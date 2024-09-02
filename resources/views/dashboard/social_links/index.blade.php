@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')

    <form action="{{ route('social_links.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="container">
                @csrf
                <div class="row mb-3 mt-3">
                    @php
                        // Define all possible platforms
                        $platforms = ['facebook', 'twitter', 'linkedin', 'instagram'];
                    @endphp
                    @foreach ($platforms as $platform)
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="{{ $platform }}">@lang('lang.' . $platform)</label>
                                <input type="text" name="{{ $platform }}" class="form-control"
                                    value="{{ $socialLinks[$platform] ?? old($platform) }}">
                                @error($platform)
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

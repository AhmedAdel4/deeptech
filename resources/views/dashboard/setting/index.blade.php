@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')
    <form action="{{ route('logo.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="container">
                <div class="row">
                    <!-- Detail Image -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="logo">@lang('lang.logo')</label>
                            <input type="file" name="logo" class="form-control">
                            @if ($settings && $settings->getLogoImage() != null)
                                <a target="_blank" href="{{ $settings->getLogoImage()->original_url }}">
                                    {{ $settings->getLogoImage()->name }}</a>
                            @endif
                            @error('logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="col-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary" id="btn-submit">@lang('lang.Save')</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

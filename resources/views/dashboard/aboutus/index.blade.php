@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')
    <form action="{{ route('aboutus.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="container">
                @csrf
                <div class="row mb-3 mt-3">

                    <!-- Main Title -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="main_title">@lang('lang.MainTitle')</label>
                            <input type="text" name="main_title" class="form-control"
                                value="{{ old('main_title', $about->main_title ?? '') }}">
                            @error('main_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Main Images -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="main_images">@lang('lang.MainImages') (@lang('lang.max: 3'))</label>
                            <input type="file" name="main_images[]" class="form-control" multiple>
                            @if ($about && $about->getMedia('about')->where('attribute', 'main_images')->count())
                                <div class="mt-2">
                                    @foreach ($about->getMedia('about')->where('attribute', 'main_images') as $media)
                                        <p class="card-text">
                                            <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }}</a>
                                        </p>
                                    @endforeach
                                </div>
                            @endif
                            @error('main_images')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @error('main_images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Opening Speech -->
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="opening_speech">@lang('lang.OpeningSpeech')</label>
                            <textarea name="opening_speech" id="opening_speech" cols="30" rows="4" class="form-control">{{ old('opening_speech', $about->opening_speech ?? '') }}</textarea>
                            @error('opening_speech')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                </div>

            </div>
        </div>
        <div class="card">
            <div class="container">
                <div class="row">
                    <!-- Details -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="details">@lang('lang.Details')</label>
                            <textarea name="details" id="details" cols="30" rows="6" class="form-control">{{ old('details', $about->details ?? '') }}</textarea>
                            @error('details')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <!-- Detail Image -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="detail_image">@lang('lang.DetailImage')</label>
                            <input type="file" name="detail_image" class="form-control">
                            @if ($about && $about->getMainImage() != null)
                                <a target="_blank" href="{{ $about->getMainImage()->original_url }}">
                                    {{ $about->getMainImage()->name }}</a>
                            @endif
                            @error('detail_image')
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

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#opening_speech'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')
    <form action="{{ route('service.update') }}" method="POST" enctype="multipart/form-data">
        @method('put')
        <div class="card">
            <div class="container">
                @csrf
                <input type="hidden" name="serviceId" value="{{ $service->id }}">
                <div class="row mb-3 mt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="title">@lang('lang.Title')</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ $service->title ?? old('title') }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <!-- Detail Image -->
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="detail_image">@lang('lang.DetailImage')</label>
                            <input type="file" name="detail_image" class="form-control">
                            @if ($service && $service->getMainImage() != null)
                                <a target="_blank" href="{{ $service->getMainImage()->original_url }}">
                                    {{ $service->getMainImage()->name }}</a>
                            @endif
                            @error('detail_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="opening_speech">@lang('lang.OpeningSpeech')</label>
                            <textarea name="opening_speech" id="opening_speech" class="form-control" required>{{ $service->opening_speech }}</textarea>
                            @error('opening_speech')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="description">@lang('lang.Description')</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

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
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

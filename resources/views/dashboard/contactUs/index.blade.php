@extends('layouts.admin.app')

@section('content')
    @include('includes.messages')
    <form action="{{ route('contactus.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="container">
                @csrf
                <div class="row mb-3 mt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="email">@lang('lang.email')</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $contact->email ?? '') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="phone">@lang('lang.phone')</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $contact->phone ?? '') }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="address">@lang('lang.Address')</label>
                            <input type="text" name="address" class="form-control"
                                value="{{ old('address', $contact->address ?? '') }}">
                            @error('address')
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


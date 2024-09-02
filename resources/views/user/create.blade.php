@extends('layouts.app')

@section('content')
@include('includes.messages')
    <div class="card">
        <div class="container">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 mt-3">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="name">@lang('lang.Name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="appear_name">@lang('lang.Appear Name')</label>
                            <input type="text" name="appear_name" class="form-control" value="{{ old('appear_name') }}">
                            @error('appear_name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="email">@lang('lang.Email')</label>
                            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="body">@lang('lang.Profile Picture')</label>
                            <input type="file" class="form-control" name="ProfilePicture">
                            @error('ProfilePicture')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="mobile_number">@lang('lang.Mobile Number')</label>
                            <input type="text" name="mobile_number" class="form-control"
                                value="{{ old('mobile_number') }}">
                            @error('mobile_number')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="mobile_number">@lang('lang.Other Mobile Number')</label>
                            <input type="text" name="other_mobile_number" class="form-control"
                                value="{{ old('other_mobile_number') }}">
                            @error('other_mobile_number')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="birth_year">@lang('lang.Birth Year')</label>
                            <input type="date" name="birth_year" class="form-control" value="{{ old('birth_year') }}">
                            @error('birth_year')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="gender">@lang('lang.Gender')</label>
                            <select name="gender" class="form-control" id="">
                                <option value="male">@lang('lang.Male')</option>
                                <option value="female">@lang('lang.Female')</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="country_id">@lang('lang.Country')</label>
                            <select name="country_id" class="form-control" id="">
                                @foreach ($countries as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="nationality">@lang('lang.Nationality')</label>
                            <select name="nationality" class="form-control" id="">
                                @foreach ($countries as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('nationality')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="role_id">@lang('lang.Role')</label>
                            <select name="role_id" class="form-control" id="">
                                @foreach ($roles as $item)
                                    <option
                                        value="{{ $item->id }}"{{ old('role_id') == $item->id ? 'selected' : '' }}>
                                        {{ app()->getLocale() == 'ar' ? $item->name_ar : $item->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="password">@lang('lang.Password')</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="password_confirmation">@lang('lang.Password Confirm')</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1"
                                name="isAmbassador">
                            <label class="form-check-label" for="isAmbassador">@lang('lang.Ambassador')</label>
                            @error('isAmbassador')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success" id="btn-submit">@lang('lang.Save')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

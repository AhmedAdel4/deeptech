@if (count($errors) > 0)
    <p class="alert alert-danger alert-dismissible fade show" style="padding-top: 8px; text-align: center;font-size: x-large; height: 40px;"> @lang('lang.error') </p>
@endif


@if (session()->has('success'))
    <p class="alert alert-success alert-dismissible fade show" style="padding-top: 8px; text-align: center;font-size: x-large; height: 40px;">{{session('success')}} </p>
@endif

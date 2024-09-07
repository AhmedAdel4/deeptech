<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="description"
        content="DEEP TECH admin is super flexible, powerful, clean &amp; modern   admin   with unlimited possibilities.">
    <meta name="keywords" content="admin  , DEEP TECH admin  , dashboard  , flat admin  ,   admin  , web app">
    <meta name="author" content="PIXINVENT">
    <title>Home - DEEP TECH - Admin </title>
    @php
        $logo = App\Models\Setting::where('name', 'logo')->first();
    @endphp
    @if ($logo && $logo->getLogoImage() != null)
        <link rel="icon" type="image/x-icon" href="{{ $logo->getLogoImage()->original_url }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/Deep Programming logo.jpg') }}">
    @endif
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors-rtl.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css-rtl/charts/apexcharts.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css-rtl/extensions/toastr.min.css"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;500;600;700&display=swap">
        <link rel="stylesheet" type="text/css"
            href="/app-assets/vendors/css-rtl/tables/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="/app-assets/vendors/css-rtl/tables/datatable/responsive.bootstrap.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/colors.css">

        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/components.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/charts/chart-apex.css">
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/plugins/extensions/ext-component-toastr.css"> --}}
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/pages/app-invoice-list.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css-rtl/custom-rtl.min.css">
        <!-- END: Page CSS-->
    @else
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css"> --}}
        <link rel="stylesheet" type="text/css"
            href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="/app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/charts/chart-apex.css">
        {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/ext-component-toastr.css"> --}}
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-invoice-list.css">
    @endif

    <!-- END: Page CSS-->
    @yield('style')

</head>
<!-- END: Head-->

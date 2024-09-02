@include('layouts.front.parts.css')


<body class="index-page" dir="rtl">
    @include('layouts.front.parts.header')

    <main class="main">
        @yield('frontContent')
    </main>

    @include('layouts.front.parts.footer')
    @include('layouts.front.parts.js')
    @yield('frontJS')
</body>


</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <bet>
        <bölüm id="üst">
            @include('layouts.header')
        </bölüm>

        <bölüm id="sol">
            @include('layouts.sidebar')
        </bölüm>

        <bölüm id="orta" class="alan">

            {{-- @include('layouts.navbar') --}}
            @yield('content')
        </bölüm>

        <bölüm id="sağ">
            <div class="alan">abece</div>
            <div class="alan">abece</div>
        </bölüm>
        <bölüm id="alt">

        </bölüm>
    </bet>



    @include('layouts.scripts')
</body>

</html>

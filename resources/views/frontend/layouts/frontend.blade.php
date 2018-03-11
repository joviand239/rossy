<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('meta_title') | {!! env('PROJECT_NAME') !!}</title>
    <meta name="description" content="@yield('meta_description')">

    <!-- Bootstrap -->
    @include('frontend.layouts.part.css')

    @yield('cssCustom')

</head>

<body>
    @include('frontend.layouts.part.header')

    @yield('content')

    @include('frontend.layouts.part.footer')

    @include('frontend.layouts.part.modal')

    @include('frontend.layouts.part.js')

    @yield('jsCustom')
</body>
</html>

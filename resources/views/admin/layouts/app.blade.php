<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    @include('admin.layouts.styles')
    @include('admin.layouts.scripts')
    @include('admin.layouts.header')
    @include('admin.layouts.setting')
{{--            sidebar--}}
    @include('admin.layouts.sidebar')
{{--        tengah tengah--}}
    @include('admin.layouts.wrapper')
{{--            footer--}}
    @include('admin.layouts.footer')

</html>

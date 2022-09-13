<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{asset('js/custom.js')}}" defer></script>
    <script rel="stylesheet" href="{{asset('css/style.css')}}" defer></script>
    <title>{{config('app.name')}}</title>
</head>
<body class="font-roboto">
    @include('inc.navbar')
    <x-messages />
    @yield('content')

    {{-- CK editor --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
</body>
</html>
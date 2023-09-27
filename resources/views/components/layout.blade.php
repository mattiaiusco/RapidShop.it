<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f571261d1b.js" crossorigin="anonymous"></script>
    <title>{{$title ?? 'rapidshop'}}</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if(request()->routeIs('announcement.bycategory') || request()->routeIs('welcome'));
        <x-navbar display='d-none'></x-navbar>
    @else
        <x-navbar display='d-block'></x-navbar>
    @endif
    
    <div class="min-vh-100 {{request()->routeIs('welcome') ? 'layout-welcome' : 'slot'}}">
        {{ $slot }}
    </div>

    <x-footer></x-footer>
    @livewireScripts
</body>

</html>
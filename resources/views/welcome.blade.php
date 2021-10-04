<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">

        <title>{{$title ?? ''}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        @livewireStyles

    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('signup'))
                            <a href="{{ route('signup') }}">Signup</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <ul>
                    <li><a href="{{route('patterns.delegation')}}">Pattern delegation</a></li>
                    <li><a href="{{route('patterns.composite')}}">Pattern composite</a></li>
                    <li><a href="{{route('patterns.adapter')}}">Pattern adapter</a></li>
                    <li><a href="{{route('patterns.decorator')}}">Pattern decorator</a></li>
                    <li><a href="{{route('patterns.strategy')}}">Pattern strategy</a></li>
                    <li><a href="{{route('patterns.abstract-factory', ['type' => \App\Patterns\AbstractFactory\GuiKitFactory::TYPE_BOOTSTRAP])}}">Pattern Abstract factory</a></li>
                    <li><a href="{{route('patterns.factory-method')}}">Pattern Factory method</a></li>
                    <li><a href="{{route('patterns.static-factory')}}">Pattern Static factory</a></li>
                    <li><a href="{{route('patterns.dto')}}">Pattern DTO</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('site.tailwind.index')}}">Tailwind</a></li>
                </ul>
            </div>
        </div>
        @livewireScripts
        <!-- Scripts -->
        <script src="{{ mix('js/app.js', 'build') }}" defer></script>
    </body>
</html>

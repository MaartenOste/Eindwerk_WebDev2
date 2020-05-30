<!DOCTYPE html>
<html data-whatinput="keyboard" data-whatintent="keyboard" class=" whatinput-types-initial whatinput-types-keyboard">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Twitch</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <meta class="foundation-mq">
    @yield('inline-style')
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                        <a class="navbar-brand" href="https://www.twitch.tv/">Twitch</a>
                        <ul class="navbar-nav mr-auto">
                            @yield('routes')
                            <li role="nav-item"><a class="nav-link" href="{{ route('news') }}">@lang('header.news')</a></li>
                            <li role="nav-item"><a class="nav-link" href="{{ route('donations') }}">@lang('header.donations')</a></li>
                        </ul>
                    </div>
                    <div class="navbar-collapse collapse w-50 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('pages.index') }}">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            <a href="{{__('header.changelang')}}">
                                <img src="{{ asset(__('header.langimg'))}}" class="img-fluid langimage align-bottom" alt="Responsive image">
                            </a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>

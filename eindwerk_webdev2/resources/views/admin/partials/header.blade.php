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
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>    <meta class="foundation-mq">
    @yield('inline-style')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</head>

<body>
    <!-- Start Top Bar -->
    <div class="top-bar">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                        <div class="navbar-brand" >Dashboard</div>
                        <ul class="navbar-nav mr-auto">
                            <li role="nav-item"><a class="nav-link" href="{{ route('pages.index') }}">Pages</a></li>
                            <li role="nav-item"><a class="nav-link" href="{{ route('admin.pages.news') }}">News</a></li>
                            <li role="nav-item"><a class="nav-link" href="{{ route('admin.pages.donations') }}">Donations</a></li>
                            <li role="nav-item"><a class="nav-link" href="{{ route('admin.pages.newsletter') }}">Newsletter</a></li>
                        </ul>
                    </div>
                    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('news') }}">
                                        Website
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
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>


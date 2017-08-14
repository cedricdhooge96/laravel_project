<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Galaxy world - Theme Park</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    </head>

    <body>
        <nav class="navbar navbar-inverse clearfix" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-left" href="{{ @url('/') }}">
                        <img src="{{ asset('img/logo.png') }}">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse clearfix" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="mainmenu-left-bar">
                        <li>
                          <a class="{{ set_active('attractions*') }}" href="{{ @url('/attractions') }}"> Attractions</a>
                        </li>
                        <li>
                             <a class="{{ set_active('about') }}" href="{{ @url('/about') }}"> About</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="mainmenu-right-bar">
                        @if (Auth::check())
                            @if(Auth::user()->hasRole('admin'))
                                <li>
                                    <a class="{{ set_active('admin*') }}" href="{{ @url('/admin') }}">Admin</a>
                                </li>
                            @endif
                            <li>
                                <a class="{{ set_active('account*') }}" href="{{ @url('/account') }}">
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                </a>
                            </li>
                            <li>
                                <a class="{{ set_active('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ @url('/logout') }}">Logout</a>
                            </li>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <li>
                                <a class="{{ set_active('login') }}" href="{{ @url('/login') }}">Login</a>
                            </li>
                            <li>
                                <a class="{{ set_active('register') }}" href="{{ @url('/register') }}">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>

        <footer>
            <div class="container">
                <div class="col-md-4 col-xs-12">
                    <h3>
                        About adventureworld
                    </h3>
                    <ul>
                        <li>
                          <a href="{{ @url('/attractions') }}">attractions</a>
                        </li>
                        <li>
                            <a href="{{ @url('/about') }}"> about</a>
                        </li>
                        <li>
                            <a href="{{ @url('/login') }}"> login</a>
                        </li>
                        <li>
                            <a href="{{ @url('/register') }}"> register</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-12">
                    <h3>
                        Our offer
                    </h3>
                    <ul>
                        <li>
                            <a href="{{ @url('/attractions') }}">attractions</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-xs-12">
                    <h3>
                        social media
                    </h3>
                    <ul>
                        <li>
                            <a href="http://www.facebook.com">facebook</a>
                        </li>
                        <li>
                            <a href="http://www.twitter.com">twitter</a>
                        </li>
                        <li>
                            <a href="http://www.linkedin.com">linked-in</a>
                        </li>
                        <li>
                            <a href="http://www.instagram.com">instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        @yield('scripts')
        {{-- @Scripts.Render("~/bundles/jquery")
        @Scripts.Render("~/bundles/bootstrap")
        @RenderSection("Scripts", required: false) --}}
    </body>
</html>

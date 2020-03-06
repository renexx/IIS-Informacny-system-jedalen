<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::asset('index.css')}}">
    <title>Jídelna</title>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
@if (!Auth::guard("operatori")->check() && !Auth::guard("administrator")->check())
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{URL::asset('logo.png')}}" alt="Logo" class="logo">
    </a>
@elseif (Auth::guard("administrator")->check())
    <a class="navbar-brand" href="{{ url('adminIS') }}">
        <img src="{{URL::asset('logo.png')}}" alt="Logo" class="logo">
    </a>
@else
    <a class="navbar-brand" href="{{ url('operatorIS') }}">
        <img src="{{URL::asset('logo.png')}}" alt="Logo" class="logo">
    </a>
@endif
<div id="navbarCollapse" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        @if (!Auth::guard("operatori")->check() && !Auth::guard("administrator")->check())
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
        @elseif (Auth::guard("administrator")->check())
        <li class="nav-item">
            <a href="{{ url('adminIS') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Spravovať prevádzky</a>
            <div class="dropdown-menu">
                <a href="{{ url('prevadzkyIS') }}" class="dropdown-item">Zobraziť prevádzky</a>
                <a href="{{ url('prevadzky/create') }}" class="dropdown-item">Nová prevádzka</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ url('ukoncit') }}" class="nav-link">Ukončiť/Spustiť objednávky</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('planVodicov') }}" class="nav-link">Zostaviť plán vodičov</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('administrátor - Logout') }}
                </a>

                <form id="logout-form" action="{{ route('operator.logout.submit') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ url('operatorIS') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Spravovať prevádzky</a>
            <div class="dropdown-menu">
                <a href="{{ url('prevadzkyIS') }}" class="dropdown-item">Zobraziť prevádzky</a>
                <a href="{{ url('prevadzky/create') }}" class="dropdown-item">Nová prevádzka</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ url('ukoncit') }}" class="nav-link">Ukončiť/Spustiť objednávky</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('planVodicov') }}" class="nav-link">Zostaviť plán vodičov</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('operátor - Logout') }}
                </a>

                <form id="logout-form" action="{{ route('operator.logout.submit') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </li>
        @endif
    </ul>

</div>
</nav>



@yield('operatorContent')


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="iisweb.js"></script>
</body>
</html>

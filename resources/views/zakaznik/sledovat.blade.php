@extends('headerUser')

@section('content')
<div class="card-deck sledovanie">
    @if ($objednavka_last == NULL)
    <h2 class="">Nemáte žiadne objednávky</h2>
    @else
    <div class="card-check">
        @if($objednavka_last->stav == "nova")
        <img src="check.png" class="card-img-top gray" alt="...">
        @else
            <img src="check.png" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">Potvrdené</h5>
        </div>
    </div>
    <div class="card-check">
        @if($objednavka_last->stav == "rozvoz" || $objednavka_last->stav == "hotovo")
        <img src="car.png" class="card-img-top" alt="...">
        @else
            <img src="car.png" class="card-img-top gray" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">Na ceste</h5>
        </div>
    </div>
    <div class="card-check">
        @if($objednavka_last->stav == "hotovo")
        <img src="house.png" class="card-img-top" alt="...">
        @else
            <img src="house.png" class="card-img-top gray" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title">Doručené</h5>
        </div>
    </div>
</div><br>


<div class="list-group list-objednavky">
<h3 class="nadpis mb-3">Posledná objednávka</h3><br>
<table class="table-table">
    <tr>
        <th class="plan-table">Číslo objednávky</th>
        <th class="plan-table">Prevádzka</th>
        <th class="plan-table">Jedlo</th>
        <th class="plan-table">Cena</th>
        <th class="plan-table">Platba</th>
        <th class="plan-table">Stav</th>
    </tr>
        <tr>
            <td class="plan-table">{{$objednavka_last->id_objednavka}}</td>
            <td class="plan-table">{{$objednavka_last->menoPrevadzky($objednavka_last->oznacenie)}}</td>
            <td class="plan-table">{{$objednavka_last->polozka($objednavka_last->id_objednavka)->popis}}</td>
            <td class="plan-table">{{$objednavka_last->polozka($objednavka_last->id_objednavka)->cena}} kč</td>
            <td class="plan-table">{{$objednavka_last->platba}}</td>
            <td class="plan-table">{{$objednavka_last->stav}}</td>
        </tr>

</table><br>
</div>

<div class="list-group list-objednavky">
    <h3 class="nadpis mb-3">Predchádzajúce</h3><br>
    <table class="table-table">
        <tr>
            <th class="plan-table">Číslo objednávky</th>
            <th class="plan-table">Prevádzka</th>
            <th class="plan-table">Jedlo</th>
            <th class="plan-table">Cena</th>
            <th class="plan-table">Platba</th>
            <th class="plan-table">Stav</th>
        </tr>
        @forelse($objednavka as $obj)
        <tr>
            <td class="plan-table">{{$obj->id_objednavka}}</td>
            <td class="plan-table">{{$obj->menoPrevadzky($obj->oznacenie)}}</td>
            <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->popis}}</td>
            <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->cena}} kč</td>
            <td class="plan-table">{{$obj->platba}}</td>
            <td class="plan-table">{{$obj->stav}}</td>
        </tr>
            @empty

            @endforelse

    </table><br>
</div>
@endif
@stop

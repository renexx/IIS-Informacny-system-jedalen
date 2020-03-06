@extends('headerOperator')

@section('operatorContent')
@if (!Auth::guard("operatori")->check() && !Auth::guard("administrator")->check())
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a class="btn">Nie ste operátor.</a>
        </div>
    </div>
</div>
@else
<div class="list-group list-prehlad">
    <h3 class="nadpis">Prehľad objednávok</h3>


    <table class="table-table">
        <tr>
            <th class="plan-table">Číslo objednávky</th>
            <th class="plan-table">Meno</th>
            <th class="plan-table">Priezvisko</th>
            <th class="plan-table">Ulica</th>
            <th class="plan-table">Číslo domu</th>
            <th class="plan-table">Mesto</th>
            <th class="plan-table">PSČ</th>
            <th class="plan-table">Prevádzka</th>
            <th class="plan-table">Jedlo</th>
            <th class="plan-table">Cena</th>
            <th class="plan-table">Platba</th>
            <th class="plan-table">Stav</th>
        </tr>
        @forelse($prehladObjed as $objednavka)
            <tr>
                <td class="plan-table">{{$objednavka->id_objednavka}}</td>
                <td class="plan-table">{{$objednavka->name}}</td>
                <td class="plan-table">{{$objednavka->lastname}}</td>
                <td class="plan-table">{{$objednavka->ulica}}</td>
                <td class="plan-table">{{$objednavka->cislo_domu}}</td>
                <td class="plan-table">{{$objednavka->mesto}}</td>
                <td class="plan-table">{{$objednavka->psc}}</td>
                <td class="plan-table">{{$objednavka->menoPrevadzky($objednavka->oznacenie)}}</td>
                <td class="plan-table">{{$objednavka->polozka($objednavka->id_objednavka)->popis}}</td>
                <td class="plan-table">{{$objednavka->polozka($objednavka->id_objednavka)->cena}} kč</td>
                <td class="plan-table">{{$objednavka->platba}}</td>
                <td class="plan-table">{{$objednavka->stav}}</td>
            </tr>

            @empty
            Neexistuje žiadna objednávka.
            @endforelse
    </table><br>
</div>
@endif
@stop

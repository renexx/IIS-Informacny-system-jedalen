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
    <div class="list-group list-driver">
        <h3 class="nadpis mb-3">Čakajúce objednávky</h3><br>
        <table class="table-table">
            <tr>
                <th class="plan-table">Číslo objednávky</th>
                <th class="plan-table">Prevádzka</th>
                <th class="plan-table">Detail</th>
                <th class="plan-table">Meno</th>
                <th class="plan-table">Adresa</th>
                <th class="plan-table">Cena</th>
                <th >Vodič</th>
            </tr>

            @forelse($objednavky as $obj)
            <tr>
                <td class="plan-table">{{$obj->id_objednavka}}</td>
                <td class="plan-table">{{$obj->menoPrevadzky($obj->oznacenie)}}</td>
                <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->popis}}</td>
                <td class="plan-table">{{$obj->name}} {{$obj->lastname}}</td>
                <td class="plan-table">{{$obj->ulica}} {{$obj->cislo_domu}}, {{$obj->mesto}}</td>
                <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->cena}} kč</td>
                <td>  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Vodici
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @forelse($planVodicov as $vodic)
                        <a class="dropdown-item" href="{{url('objednavka/update/' . $obj->id_objednavka . '/' . $vodic->id)}}">{{$vodic->login}}</a>
                        @empty
                            žiadny vodič neexistuje
                        @endforelse
                    </div>
                </div></td>
            @empty
                Nie su ziadne objednavky.
            </tr>
                @endforelse

        </table><br>
    </div>
@endif
@stop

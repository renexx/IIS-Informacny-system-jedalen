@extends('headerVodic')

@section('vodicContent')
@if (!Auth::guard("vodici")->check() && !Auth::guard("administrator")->check())
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a class="btn">Nie ste vodič.</a>
        </div>
    </div>
</div>
@else
      <div class="list-group list-vybavuje">
        <h3 class="nadpis">Vybavuje sa</h3><br>
          <table class="table-table">
              @forelse($objednavky_rozvoz as $rozvoz)
              <tr>
                  <td class="plan-table">{{$rozvoz->menoPrevadzky($rozvoz->oznacenie)}}</td>
                  <td class="plan-table">{{$rozvoz->polozka($rozvoz->id_objednavka)->popis}}</td>
                  <td class="plan-table">{{$rozvoz->name}} {{$rozvoz->lastname}}</td>
                  <td >{{$rozvoz->ulica}} {{$rozvoz->cislo_domu}}, {{$rozvoz->mesto}}</td>
                  <td class="plan-table">{{$rozvoz->polozka($rozvoz->id_objednavka)->cena}} kč</td>
                  <td>{{$rozvoz->platba}}</td>
                  <td><a href="{{url("objednavka/dorucit/" . $rozvoz->id_objednavka )}}" class="btn btn-primary ">Doručené</a></td>
              </tr>
                  @empty
              @endforelse
          </table>
     </div>

      <div class="list-group list-driver">
        <h3 class="nadpis">Čakajúce objednávky</h3><br>
          <table class="table-table">
              <tr>
                  <th class="plan-table">Prevádzka</th>
                  <th>Detail</th>
                  <th class="plan-table">Meno</th>
                  <th >Adresa</th>
                  <th>Cena</th>
                  <th>Platba</th>
                  <th></th>
              </tr>

              @forelse($objednavky_cakajuce as $obj)
              <tr>
                  <td class="plan-table"> {{$obj->menoPrevadzky($obj->oznacenie)}}</td>
                  <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->popis}}</td>
                  <td class="plan-table">{{$obj->name}} {{$obj->lastname}}</td>
                  <td >{{$obj->ulica}} {{$obj->cislo_domu}}, {{$obj->mesto}}</td>
                  <td class="plan-table">{{$obj->polozka($obj->id_objednavka)->cena}} kč</td>
                  <td>{{$obj->platba}}</td>
                  <td><a href="{{url("objednavka/vybavit/". $obj->id_objednavka)}}" class="btn btn-primary ">Vybavit</a></td>
              </tr>
                  @empty
                  <tr>
                      <td class="plane-table"></td>
                      <td class="plane-table"></td>
                      <td class="plane-table">Žiadne čakajúce objednávky.</td>
                      <td class="plane-table"></td>
                      <td class="plane-table"></td>
                  </tr>
            @endforelse
          </table>

      </div>
@endif
@stop

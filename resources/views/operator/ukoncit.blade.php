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
      <div class="list-group list-ukoncit">
        <h3 class="nadpis mb-3">Ukončiť/Spustiť objednávky</h3>
          <tr>
              <th class="plan-table">Prevádzka</th>
              <th class="plan-table">Stav</th>
              <th class="plan-table"></th>
          </tr>
          @forelse($prevadzky as $prev)
          <div class=" list-group-item d-flex w-100 justify-content-between">
          <tr>
            <td class="plan-table"><p class="mb-1">{{$prev->nazov}}</p></td>
            @if ($prev->koniec_objednavok == "nie")
            <td class="plan-table"><a class="text-success font-weight-bold">OBJEDNÁVKY SPUSTENÉ</a></td>
            <td class="plan-table"><a href="{{url('/ukoncit/true', $prev->oznacenie)}}" class="btn btn-primary ">Ukončiť</a></td>
            @else
            <td class="plan-table"><a class="text-danger font-weight-bold">OBJEDNÁVKY UKONČENÉ</a></td>
            <td class="plan-table"><a href="{{url('/ukoncit/false', $prev->oznacenie)}}" class="btn btn-primary ">Spustiť</a></td>
            @endif
        </tr>
         </div>
              @empty
          Všetky prevádzky už ukončili svoje objednávky.
              @endforelse
      </div>
      @endif
@stop

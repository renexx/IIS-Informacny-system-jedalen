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
    <div>

        <div class="card-deck deck-vstup">
            <div class="card vstup">
                <a href="{{ url('prevadzkyIS') }}" class="btn btn-primary btn-vstup">Zobraziť všetky prevádzky</a>
            </div>

            <div class="card vstup">
                <a href="{{ url('prevadzky/create') }}" class="btn btn-primary btn-vstup">Pridať prevádzku</a>
            </div>
            <div class="card vstup">
                <a href="{{ url('prevadzkyIS') }}" class="btn btn-primary btn-vstup">Upraviť prevádzku</a>
            </div>
        </div>
        <div class="card-deck deck-vstup">
            <div class="card vstup">
                <a href="{{ url('ukoncit') }}" class="btn btn-primary btn-vstup">Ukončiť objednávky</a>
            </div>
            <div class="card vstup">
                <a href="{{ url('planVodicov') }}" class="btn btn-primary btn-vstup">Zostaviť plán vodičov</a>
            </div>
            <div class="card vstup">
                <a href="{{ url('/') }}" class="btn btn-primary btn-vstup">Zákaznícka stránka</a>
            </div>
        </div>
        <div class="card-deck deck-vstup">
          <div class="card vstup">
              <a href="{{ url('prehladObjednavok') }}" class="btn btn-primary btn-vstup">Zobraziť všetky objednávky</a>
          </div>
        </div>

    </div>
@endif
@stop

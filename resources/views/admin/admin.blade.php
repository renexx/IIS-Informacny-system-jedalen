@extends('admin-header')

@section('adminContent')
@if (!Auth::guard("administrator")->check())
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a class="btn">Nie ste administrátor.</a>
        </div>
    </div>
</div>
@else
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a href="{{ url('prehladUzivatelia') }}" class="btn btn-primary btn-vstup">Zobraziť užvateľov</a>
        </div>
        <div class="card vstup">
            <a href="{{ url('prehladOperatori') }}" class="btn btn-primary btn-vstup">Zobraziť operátorov</a>
        </div>
        <div class="card vstup">
            <a href="{{ url('prehladVodici') }}" class="btn btn-primary btn-vstup">Zobraziť vodičov</a>
        </div>
    </div>

    <div class="card-deck deck-vstup">

        <div class="card vstup">
            <a href="{{ url('prevadzky/create') }}" class="btn btn-primary btn-vstup">Pridať prevádzku</a>
        </div>

        <div class="card vstup">
            <a href="{{ url('operator/create') }}" class="btn btn-primary btn-vstup">Pridať operátora</a>
        </div>
        <div class="card vstup">
            <a href="{{ url('vodic/create') }}" class="btn btn-primary btn-vstup">Pridať vodiča</a>
        </div>
    </div>

    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a href="{{ url('prevadzkyIS') }}" class="btn btn-primary btn-vstup">Zobraziť všetky prevádzky</a>
        </div>
        <div class="card vstup">
            <a href="{{ url('ukoncit') }}" class="btn btn-primary btn-vstup">Ukončiť/Spustiť objednávky</a>
        </div>

        <div class="card vstup">
            <a href="{{ url('planVodicov') }}" class="btn btn-primary btn-vstup">Zostaviť plán vodičov</a>
        </div>

    </div>

    <div class="card-deck deck-vstup-last">
        <div class="card vstup">
            <a href="{{ url('/') }}" class="btn btn-primary btn-vstup">Zákaznícka stránka</a>
        </div>
        <div class="card vstup">
            <a href="{{ url('prehladObjednavok') }}" class="btn btn-primary btn-vstup">Zobraziť všetky objednávky</a>
        </div>
    </div>
</div>
@endif
@stop

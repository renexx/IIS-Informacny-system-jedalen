@extends('headerUser')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{$meno->nazov}}</h1>
        <p class="lead text-muted">{{$meno->ulica}} {{$meno->cislo_domu}}</p>
        <p class="lead text-muted">{{$meno->mesto}} {{$meno->psc}}</p>
        <p class="lead text-muted">Ukončenie objednávok: {{$meno->uzv_objednavok}} </p>
</section>

<p>
    <section class="menu-block">

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Stála ponuka</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Denné menu</button>
        </div>

        <!-- Tab content -->
        <div id="London" class="tabcontent">

                <div class="dropdown filter">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filtrovať
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{url('menu', $meno->oznacenie )}}">Zobraziť všetko</a>
                        <a class="dropdown-item" href="{{url('menu', $meno->oznacenie . '/' . "normal")}}">Normal</a>
                        <a class="dropdown-item" href="{{url('menu', $meno->oznacenie . '/' . "bezlepok")}}" >Bezlepkové</a>
                        <a class="dropdown-item" href="{{url('menu', $meno->oznacenie . '/' . "vegetarian")}}">Vegetarianske</a>
                        <a class="dropdown-item"  href="{{url('menu', $meno->oznacenie . '/' . "vegan")}}">Vegánske</a>
                        <a class="dropdown-item"  href="{{url('menu', $meno->oznacenie . '/' . "raw")}}#">Raw</a>
                        <a class="dropdown-item" href="{{url('menu', $meno->oznacenie . '/' . "fit")}}">Fit</a>
                    </div>
                </div>


            <h3>Stála ponuka</h3>
            <ul class="list-unstyled">
                <h3 class="mt-5 mb-5">Jedlo</h3>

                @forelse($jedlo as $polozka)
                <li class="media">
                    <img src="{{URL::asset($polozka->obrazok)}}" class="mr-3" alt="{{$polozka->popis}}">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{$polozka->popis}}</h5>
                        <b>Kategória:</b> {{$polozka->kategoria}}<br>
                        <b>Typ: </b>{{$polozka->typ}}<br>
                        <b> Hmotnosť:</b> {{$polozka->hmotnost}} gramov
                    </div>
                    <div class="cena">
                        Cena: {{$polozka->cena}} kč
                    </div>
                    @if($meno->koniec_objednavok == "ano")
                         <a class="btn btn-primary objednat not-active" href="" role="button">Objednať</a>
                    @else
                        @php
                        $typ = "jedlo";
                        @endphp
                        <a class="btn btn-primary objednat " href="{{ url('objednavka/create',[$meno->oznacenie, $polozka->id_jedlo, $typ]) }}" role="button">Objednať</a>
                    @endif
                </li><br>
                    @empty
                    <label>Prevádzka nemá v databáze žiadne jedlá</label>
                @endforelse


            </ul>

            <ul class="list-unstyled">
                <h3 class="mt-5 mb-5">Nápoje</h3>

                @forelse($napoj as $piticko)
                    <li class="media">
                        <img src="{{URL::asset($piticko->obrazok)}}" class="mr-3" alt="{{$piticko->popis}}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{$piticko->popis}}</h5>
                            <b>Kategória:</b> {{$piticko->kategoria}}<br>
                            <b>Typ: </b>{{$piticko->typ}}<br>
                            <b>Objem:</b> {{$piticko->objem}} ml
                        </div>
                        <div class="cena">
                            Cena: {{$piticko->cena}} kč
                        </div>
                        @if($meno->koniec_objednavok == "ano")
                            <a class="btn btn-primary objednat not-active" href="" role="button">Objednať</a>
                        @else
                            @php
                                $typ = "napoj";
                            @endphp
                            <a class="btn btn-primary objednat " href="{{ url('objednavka/create',[$meno->oznacenie, $piticko->id_napoj, $typ]) }}" role="button">Objednať</a>
                        @endif
                    </li><br>
                @empty
                    <label>Táto prevádzka neponúka nápoje</label>
                @endforelse


            </ul>
        </div>

        <div id="Paris" class="tabcontent">

            <h3>Denné menu</h3>
            <ul class="list-unstyled">
                <h3 class="mt-5 mb-5">Jedlo</h3>

                @forelse($denne_jedlo as $jedlod)
                    <li class="media">
                        <img src="{{URL::asset($jedlod->first()->obrazok)}}" class="mr-3" alt="{{$jedlod->first()->popis}}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{$jedlod->first()->popis}}</h5>
                            <b>Kategória:</b>  {{$jedlod->first()->kategoria}}<br>
                            <b>Typ: </b> {{$jedlod->first()->typ}}<br>
                            <b>Hmotnosť:</b> {{$jedlod->first()->hmotnost}} gramov
                        </div>
                        <div class="cena">
                            Cena: {{$jedlod->first()->cena}} kč
                        </div>
                        @if($meno->koniec_objednavok == "ano")
                            <a class="btn btn-primary objednat not-active" href="" role="button">Objednať</a>
                        @else
                            @php
                                $typ = "jedlo";
                            @endphp
                            <a class="btn btn-primary objednat " href="{{ url('objednavka/create',[$meno->oznacenie, $jedlod->first()->id_jedlo, $typ]) }}" role="button">Objednať</a>
                        @endif
                    </li><br>
                @empty
                    <label>V tomto dennom menu nie sú žiadne jedlá.</label>
                @endforelse

            </ul>

            <ul class="list-unstyled">
                <h3 class="mt-5 mb-5">Nápoje</h3>

                @forelse($denny_napoj as $napojden)
                    <li class="media">
                        <img src="{{URL::asset($napojden->first()->obrazok)}}" class="mr-3" alt="{{$napojden->first()->popis}}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{$napojden->first()->popis}}</h5>
                            <b>Kategória: </b> {{$napojden->first()->kategoria}}<br>
                            <b>Typ: </b>{{$napojden->first()->typ}}<br>
                            <b>Objem: </b> {{$napojden->first()->objem}} ml
                        </div>
                        <div class="cena">
                            Cena: {{$napojden->first()->cena}} kč
                        </div>
                        @if($meno->koniec_objednavok == "ano")
                            <a class="btn btn-primary objednat not-active" href="" role="button">Objednať</a>
                        @else
                            @php
                                $typ = "napoj";
                            @endphp
                            <a class="btn btn-primary objednat " href="{{ url('objednavka/create', [$meno->oznacenie, $napojden->first()->id_napoj, $typ]) }}" role="button">Objednať</a>
                        @endif
                    </li><br>

                @empty
                    <label > V tomto dennom menu nie sú žiadne nápoje</label>
                @endforelse

            </ul>
        </div>
    </section>

    <script src="{{URL::asset('iisweb.js')}}"></script>


    @stop

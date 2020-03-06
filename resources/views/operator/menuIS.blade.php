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
       <p>
       <h2>{{$meno->nazov}}</h2>
       @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
          </div>
       @elseif ($message = Session::get('error'))
           <div class="alert alert-danger alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
           </div>
       @endif
       <section class="menu-block">

               <div class="tab">
                 <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Stála ponuka</button>
                 <button class="tablinks" onclick="openCity(event, 'Paris')">Denné menu</button>
               </div>

               <!-- Tab content -->
               <div id="London" class="tabcontent">
                <a class="btn btn-primary pridat" href="{{ url('jedlo/create', $meno->oznacenie) }}" role="button">Pridať jedlo</a>
                <a class="btn btn-primary pridat" href="{{ url('napoj/create', $meno->oznacenie) }}" role="button">Pridať napoj</a>

                <h3>Stála ponuka</h3>
                 <ul class="list-unstyled">
                     <h3 class="mt-5 mb-5">Jedlo</h3>

                     @forelse($jedlo as $polozka)
                        <li class="media">
                          <img src="{{URL::asset($polozka->obrazok)}}" class="mr-3" alt="...">
                          <div class="media-body">
                              <h5 class="mt-0 mb-1">{{$polozka->popis}}</h5>
                              <b>Kategória:</b> {{$polozka->kategoria}}<br>
                              <b>Typ: </b>{{$polozka->typ}}<br>
                              <b>Hmotnosť:</b> {{$polozka->hmotnost}} gramov
                          </div>
                            <div class="cenaIS">
                                Cena: {{$polozka->cena}} kč
                            </div>
                          <a class="btn btn-primary objednat2" href="{{ route('jedlo.edit', ["$polozka->id_jedlo"]) }}" role="button">Upraviť</a>
                          <a class="btn btn-primary objednat2 " href="{{ url('menu/addJedlo', [$meno->oznacenie, $polozka->id_jedlo]) }}" role="button">Pridať do menu</a>
                          <form action="{{route('jedlo.destroy',$polozka->id_jedlo) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-primary objednat2">Odstrániť</button>
                          </form>
                        </li><br>
                     @empty
                         <label>Táto prevádzka neponúka žiadne jedlo</label>
                     @endforelse
                 </ul>

                 <ul class="list-unstyled">
                    <h3 class="mt-5 mb-5">Nápoje</h3>

                  @forelse($napoj as $piticko)
                       <li class="media">
                         <img src="{{URL::asset($piticko->obrazok)}}" class="mr-3" alt="...">
                         <div class="media-body">
                             <h5 class="mt-0 mb-1">{{$piticko->popis}}</h5>
                             <b>Kategória:</b> {{$piticko->kategoria}}<br>
                             <b>Typ: </b>{{$piticko->typ}}<br>
                             <b>Objem:</b> {{$piticko->objem}} ml
                         </div>
                           <div class="cenaIS">
                               Cena: {{$piticko->cena}} kč
                           </div>
                            <a class="btn btn-primary objednat2" href="{{ route('napoj.edit', ["$piticko->id_napoj"]) }}" role="button">Upraviť</a>
                            <a class="btn btn-primary objednat2 " href="{{ url('menu/addNapoj', [$meno->oznacenie, $piticko->id_napoj]) }}" role="button">Pridať do menu</a>
                            <form action="{{route('napoj.destroy',$piticko->id_napoj) }}" method="POST">
                             @csrf
                             {{ method_field('DELETE') }}
                             <button type="submit" class="btn btn-primary objednat2">Odstrániť</button>
                           </form>
                       </li><br>
                     @empty
                         <label>Táto prevádzka nemá žiadne nápoje</label>
                     @endforelse
                   </ul>
               </div>


               <div id="Paris" class="tabcontent">
                 <a class="btn btn-primary pridat" href="{{ url('menu/IS/create', $meno->oznacenie) }}" role="button">Nové menu</a>
                 <h3>Denné menu</h3>
                 <ul class="list-unstyled">

                     <h3 class="mt-5 mb-5">Jedlo</h3>
                     @forelse($denne_jedlo as $jedlod)
                         <li class="media">
                             <img src="{{URL::asset($jedlod->first()->obrazok)}}" class="mr-3" alt="...">
                             <div class="media-body">
                                 <h5 class="mt-0 mb-1">{{$jedlod->first()->popis}}</h5>
                                 <b>Kategória:</b>  {{$jedlod->first()->kategoria}}<br>
                                 <b>Typ: </b> {{$jedlod->first()->typ}}<br>
                                 <b>Hmotnosť:</b> {{$jedlod->first()->hmotnost}} gramov
                             </div>
                             <div class="cenaIS">
                                 Cena: {{$jedlod->first()->cena}} kč
                             </div>
                             <a class="btn btn-primary objednat2" href="{{ url('menu/removeJedlo', [$meno->oznacenie, $jedlod->first()->id_jedlo]) }}" role="button">Vymazať z menu</a>
                         </li><br>
                     @empty
                         <label>Táto prevádzka neponúka žiadne jedlo</label>
                     @endforelse
                 </ul>
                   <ul  class="list-unstyled">
                     <h3 class="mt-5 mb-5">Nápoje</h3>
                     @forelse($denny_napoj as $napojden)
                         <li class="media">
                             <img src="{{URL::asset($napojden->first()->obrazok)}}" class="mr-3" alt="...">
                             <div class="media-body">
                                 <h5 class="mt-0 mb-1">{{$napojden->first()->popis}}</h5>
                                 <b>Kategória: </b> {{$napojden->first()->kategoria}}<br>
                                 <b>Typ: </b>{{$napojden->first()->typ}}<br>
                                 <b>Objem: </b> {{$napojden->first()->objem}} ml
                             </div>
                             <div class="cenaIS">
                                 Cena: {{$napojden->first()->cena}} kč
                             </div>
                             <a class="btn btn-primary objednat2" href="{{ url('menu/removeNapoj', [$meno->oznacenie, $napojden->first()->id_napoj]) }}" role="button">Vymazať z menu</a>
                         </li><br>


                @empty
                    <label>Táto prevádzka nemá žiadne nápoje</label>
                    @endforelse
                    </ul>
               </div>
           </section>
       <script src="{{URL::asset('iisweb.js')}}"></script>
@endif
@stop

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
    @php
        $cnt = 0;
        $pocet = count($prevadzky);
        if ($pocet == 2) $flag = 2;
        elseif ($pocet == 1) $flag = 1;
        else{
        $a = ceil($pocet / 3);
        $flag=0;
        }
    @endphp
    @if($flag == 0)
    @for($i = 0; $i < $a; $i++)

      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$prevadzky[0+$cnt]->nazov}}</h4>
          </div>
          <div class="card-body">
            <h5>Adresa</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</li>
              <li> {{$prevadzky[0+$cnt]->mesto}}</li>
              <li>{{$prevadzky[0+$cnt]->psc}}</li>
            </ul>
            <h5>Uzavierka</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[0+$cnt]->uzv_objednavok}}</li>
            </ul>
              <a href="{{ url('menu/IS', $prevadzky[0+$cnt]->oznacenie )}}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
              <a href="{{route('prevadzky.edit',$prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>

              <form action="{{route('prevadzky.destroy',$prevadzky[0+$cnt]->oznacenie) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
              </form>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$prevadzky[1+$cnt]->nazov}}</h4>
          </div>
          <div class="card-body">
            <h5>Adresa</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[1+$cnt]->ulica}} {{$prevadzky[1+$cnt]->cislo_domu}}</li>
              <li> {{$prevadzky[1+$cnt]->mesto}}</li>
              <li>{{$prevadzky[1+$cnt]->psc}}</li>
            </ul>
            <h5>Uzavierka</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[1+$cnt]->uzv_objednavok}}</li>
            </ul>
              <a href="{{ url('menu/IS', $prevadzky[1+$cnt]->oznacenie)}}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
              <a href="{{route('prevadzky.edit',$prevadzky[1+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>
              <form action="{{route('prevadzky.destroy',$prevadzky[1+$cnt]->oznacenie) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
              </form>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{$prevadzky[2+$cnt]->nazov}}</h4>
          </div>
          <div class="card-body">
            <h5>Adresa</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[2+$cnt]->ulica}} {{$prevadzky[2+$cnt]->cislo_domu}}</li>
              <li> {{$prevadzky[2+$cnt]->mesto}}</li>
              <li>{{$prevadzky[2+$cnt]->psc}}</li>
            </ul>
            <h5>Uzavierka</h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{$prevadzky[2+$cnt]->uzv_objednavok}}</li>
            </ul>
             <a href="{{ url('menu/IS', $prevadzky[2+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
            <a href="{{route('prevadzky.edit',$prevadzky[2+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>
              <form action="{{route('prevadzky.destroy',$prevadzky[2+$cnt]->oznacenie) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
              </form>
          </div>
        </div>
      </div>
      @php
          if($cnt+3 == $pocet-1){
              $flag = 1;
              $cnt = $cnt +3;
              break;
          }
          elseif ($cnt+4 == $pocet-1){
              $flag = 2;
              $cnt = $cnt +3;
              break;
          }
          else
              $cnt=$cnt +3;
      @endphp
    @endfor
    @endif
    @if($flag == 1)
        <div class="card-deck mb-3 text-center last" >
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">{{$prevadzky[0+$cnt]->nazov}}</h4>
            </div>
            <div class="card-body">
                <h5>Adresa</h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>{{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</li>
                    <li> {{$prevadzky[0+$cnt]->mesto}}</li>
                    <li>{{$prevadzky[0+$cnt]->psc}}</li>
                </ul>
                <h5>Uzavierka</h5>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>{{$prevadzky[0+$cnt]->uzv_objednavok}}</li>
                </ul>
                <a href="{{ url('menu/IS', $prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
                <a href="{{route('prevadzky.edit',$prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>
                <form action="{{route('prevadzky.destroy',$prevadzky[0+$cnt]->oznacenie) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
                </form>
            </div>
        </div>
        </div>
    @elseif($flag == 2)
        <div class="card-deck mb-3 text-center last-two" >
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{$prevadzky[0+$cnt]->nazov}}</h4>
                </div>
                <div class="card-body">
                    <h5>Adresa</h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>{{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</li>
                        <li> {{$prevadzky[0+$cnt]->mesto}}</li>
                        <li>{{$prevadzky[0+$cnt]->psc}}</li>
                    </ul>
                    <h5>Uzavierka</h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>{{$prevadzky[0+$cnt]->uzv_objednavok}}</li>
                    </ul>
                    <a href="{{ url('menu/IS', $prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
                    <a href="{{route('prevadzky.edit',$prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>
                    <form action="{{route('prevadzky.destroy',$prevadzky[0+$cnt]->oznacenie) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{$prevadzky[1+$cnt]->nazov}}</h4>
                </div>
                <div class="card-body">
                    <h5>Adresa</h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>{{$prevadzky[1+$cnt]->ulica}} {{$prevadzky[1+$cnt]->cislo_domu}}</li>
                        <li> {{$prevadzky[1+$cnt]->mesto}}</li>
                        <li>{{$prevadzky[1+$cnt]->psc}}</li>
                    </ul>
                    <h5>Uzavierka</h5>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>{{$prevadzky[1+$cnt]->uzv_objednavok}}</li>
                    </ul>
                    <a href="{{ url('menu/IS', $prevadzky[1+$cnt]->oznacenie )}}" class="btn btn-lg btn-block btn-outline-primary">Jedálny lístok</a>
                    <a href="{{route('prevadzky.edit',$prevadzky[1+$cnt]->oznacenie) }}" class="btn btn-lg btn-block btn-outline-primary">Upraviť</a><br>
                    <form action="{{route('prevadzky.destroy',$prevadzky[1+$cnt]->oznacenie) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Odstrániť</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif
@stop

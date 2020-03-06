
@extends('headerUser')

@section('content')
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

    <div class="card-deck">
        <div class="card">
            <img src={{$prevadzky[0+$cnt]->obrazok}} class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$prevadzky[0+$cnt]->nazov}}</h5>
                <p class="card-text"> {{$prevadzky[0+$cnt]->mesto}}</p>
                <p class="card-text"> {{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</p>
            </div>
            <a href="{{ url('menu', $prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
        </div><br>

        <div class="card">
            <img src={{$prevadzky[1+$cnt]->obrazok}} class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$prevadzky[1+$cnt]->nazov}}</h5>
                <p class="card-text">{{$prevadzky[1+$cnt]->mesto}}</p>
                <p class="card-text"> {{$prevadzky[1+$cnt]->ulica}} {{$prevadzky[1+$cnt]->cislo_domu}}</p>
            </div>
            @php
            $id = $prevadzky[1+$cnt]->oznacenie;
            @endphp
            <a href="{{url('menu', $prevadzky[1+$cnt]->oznacenie)}}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
        </div>

        <div class="card">
            <img src={{$prevadzky[2+$cnt]->obrazok}} class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$prevadzky[2+$cnt]->nazov}}</h5>
                <p class="card-text">{{$prevadzky[2+$cnt]->mesto}}</p>
                <p class="card-text"> {{$prevadzky[2+$cnt]->ulica}} {{$prevadzky[2+$cnt]->cislo_domu}}</p>
            </div>
            <a href="{{url('menu', $prevadzky[2+$cnt]->oznacenie)}}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
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
        <div class="card-deck last">
            <div class="card">
                <img src={{$prevadzky[0+$cnt]->obrazok}} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$prevadzky[0+$cnt]->nazov}}</h5>

                    <p class="card-text"> {{$prevadzky[0+$cnt]->mesto}}</p>
                    <p class="card-text"> {{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</p>
                </div>
                <a href="{{ url('menu', $prevadzky[0+$cnt]->oznacenie) }}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
            </div>
        </div>
    @elseif($flag == 2)
        <div class="card-deck last-two">
            <div class="card">
                <img src={{$prevadzky[0+$cnt]->obrazok}} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$prevadzky[0+$cnt]->nazov}}</h5>
                    <p class="card-text"> {{$prevadzky[0+$cnt]->mesto}}</p>
                    <p class="card-text"> {{$prevadzky[0+$cnt]->ulica}} {{$prevadzky[0+$cnt]->cislo_domu}}</p>
                </div>
                <a href="{{url('menu', $prevadzky[0+$cnt]->oznacenie)}}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
            </div><br>

            <div class="card">
                <img src={{$prevadzky[1+$cnt]->obrazok}} class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$prevadzky[1+$cnt]->nazov}}</h5>
                    <p class="card-text">{{$prevadzky[1+$cnt]->mesto}}</p>
                    <p class="card-text"> {{$prevadzky[1+$cnt]->ulica}} {{$prevadzky[1+$cnt]->cislo_domu}}</p>
                </div>
                <a href="{{url('menu', $prevadzky[1+$cnt]->oznacenie)}}" class="btn btn-primary jedalnicek">Prezrieť jedálny lístok</a>
            </div>
        </div>
    @endif
    @stop

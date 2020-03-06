@extends('headerVstup')

@section('vstup')
      <div class="card-deck deck-vstup">
          <div class="card vstup">
            <img class="img-vstup" src="admin.png" class="card-img-top" alt="...">
            <a href="{{route('admin.login')}}" class="btn btn-primary btn-vstup">Prihlásiť sa ako administrátor</a>
          </div>
          <div class="card vstup">
            <img class="img-vstup" src="operator.png" class="card-img-top" alt="...">
            <a href="{{route('operator.login')}}" class="btn btn-primary btn-vstup">Prihlásiť sa ako operátor</a>
          </div>
          <div class="card vstup">
            <img class="img-vstup" src="vodic.png" class="card-img-top" alt="...">
            <a href="{{route('vodic.login')}}" class="btn btn-primary btn-vstup">Prihlásiť sa ako vodič</a>
          </div>
        </div>

@stop

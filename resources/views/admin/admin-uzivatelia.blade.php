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
<div class="list-group list-driver">
    <h3 class="nadpis">Užívatelia</h3>

    @forelse($prehladUzivatelov as $uzivatel)
    <div class=" list-group-item d-flex w-100 justify-content-between">
        <p class="mb-1">{{$uzivatel->name}} {{$uzivatel->lastname}}</p>
        <p class="mb-1">{{$uzivatel->email}}</p>
        <p class="mb-1">{{$uzivatel->ulica}} {{$uzivatel->cislo_domu}}, {{$uzivatel->mesto}}</p>
        <a href="{{route('uzivatel.edit', $uzivatel->id)}}" class="btn btn-primary ">Upraviť</a>

        <form action="{{route('uzivatel.destroy',$uzivatel->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary">Odstrániť</button>
        </form>

    </div>
        @empty
            Žiadny užívateľ nie je zaregistrovaný.
        @endforelse
</div>
@endif
@stop

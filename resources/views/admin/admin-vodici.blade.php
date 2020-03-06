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
    <h3 class="nadpis">Vodiči</h3>

    @forelse($prehladVodicov as $vodic)
    <div class=" list-group-item d-flex w-100 justify-content-between">
        <!-- <p class="mb-1"></p> -->
        <p class="mb-1">{{$vodic->meno}} {{$vodic->priezvisko}}</p>
        <p class="mb-1">{{$vodic->ulica}} {{$vodic->cislo_domu}}, {{$vodic->mesto}}</p>
        <a href="{{route('vodic.edit', $vodic->id)}}" class="btn btn-primary ">Upraviť</a>
        <form action="{{route('vodic.destroy',$vodic->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary">Odstrániť</button>
        </form>
    </div>
    @empty
        Žiadny vodič nie je zaregistrovaný.
    @endforelse
</div>
@endif
@stop

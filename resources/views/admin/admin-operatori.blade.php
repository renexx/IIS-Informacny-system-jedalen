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
        <h3 class="nadpis">Operátori</h3>

          @forelse($prehladOperatorov as $operator)
          <div class=" list-group-item d-flex w-100 justify-content-between">
            <p class="mb-1">LOGIN: {{$operator->login}}</p>
            <a href="{{route('operator.edit', $operator->id)}}" class="btn btn-primary ">Upraviť</a>

              <form action="{{route('operator.destroy',$operator->id) }}" method="POST">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button type="submit"  class="btn btn-primary">Odstrániť</button>
              </form>
         </div>

          @empty
            Neexistujú žiadny operátori.
              @endforelse
     </div>
@endif
@stop

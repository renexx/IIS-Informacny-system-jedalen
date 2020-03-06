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
      <div class="novaP">

          <div class="col-auto order-md-1">
              @if ($message = Session::get('success'))
                 <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
                 </div>
              @endif

            <h4 class="mb-3">Nové denné menu </h4>

            <form action="{{route('menu.store')}}" method="post" class="needs-validation">
                @csrf
                <input type="hidden" name="oznacenie" value="{{$oznacenie}}">
                <div class="row">
                    <div class="col-md-10 mb-3">
                  <label for="popis">Interný limit</label>
                  <input type="text" pattern="[0-9]+" name="interny_limit" class="form-control"  placeholder="" value="{{old('interny_limit')}}" required="" autofocus>
                  <div class="invalid-feedback">
                    Vyplňte interný limit.
                  </div>
              </div>
              </div>

              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Uložiť</button>

            </form>
          </div>
        </div>
@endif
@stop

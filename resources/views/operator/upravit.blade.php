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

            <h4 class="mb-3">Upraviť prevádzku {{$prevadzky->nazov}}</h4>

            <form action="{{route("prevadzky.update", ["$prevadzky->oznacenie"])}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                  <label for="nazov">Názov</label>
                  <input name="nazov" id="nazov" type="text" class="form-control"  placeholder="Upravte nazov" value="{{old("nazov") ?: $prevadzky->nazov}}" required="">
                  <div class="invalid-feedback">
                    Názov je povinný
                  </div>
              </div>

              <div class="mb-3">
                <label for="ulica">Ulica</label>
                <input name="ulica" type="text" class="form-control" id="ulica" placeholder="Bayerova" value="{{old("ulica") ?: $prevadzky->ulica}}" required="">
                <div class="invalid-feedback">
                  Ulica je povinná
                </div>
              </div>

                <div class="mb-3">
                    <label for="cislo_domu">Číslo domu</label>
                    <input name="cislo_domu" type="text" pattern="[0-9]+" class="form-control" id="cislo_domu" placeholder="1234" required="" value="{{old("cislo_domu") ?: $prevadzky->cislo_domu}}">
                    <div class="invalid-feedback">
                        Cislo domu je povinné
                    </div>
                </div>

              <div class="mb-3">
                <label for="mesto">Mesto</label>
                <input name="mesto" type="text" class="form-control" id="mesto" placeholder="Mesto" value="{{old("mesto") ?: $prevadzky->mesto}}">
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="psc">PSČ</label>
                  <input  name="psc" type="text" pattern="[0-9]{5}" class="form-control" id="psc" placeholder="60200" value="{{old("psc") ?: $prevadzky->psc}}" required="">
                  <div class="invalid-feedback">
                    PSC je povinné
                  </div>
                </div>
              </div>

                <div class="mb-3">
                    <label for="uzv_objednavok">Uzávierka</label>
                    <input type="time" name="uzv_objednavok" step="2" class="form-control" id="uzv_objednavok" placeholder="hodina" value="{{old("uzv_objednavok") ?: $prevadzky->uzv_objednavok}}">
                </div>

                <div class="mb-3">
                    <label for="obrazok">Obrázok</label>
                    <input id="obrazok" type="file" class="btn @error('err') is-invalid @enderror" name="obrazok" value="{{ old('obrazok') }}" autocomplete="obrazok">
                    @error('err')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Uložiť</button>

            </form>
          </div>
        </div>
@endif
@stop

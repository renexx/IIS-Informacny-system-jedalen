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

            <h4 class="mb-3">Nová prevádzka</h4>

            <form action="{{ route('prevadzky.store.submit') }}" method="post" class="needs-validation" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label for="nazov">Názov</label>
                  <input type="text" name="nazov" class="form-control" id="nazov" placeholder="" value="{{ old("nazov") }}" required="" autofocus>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
              </div>

              <div class="mb-3">
                <label for="ulica">Ulica</label>
                <input type="text" name="ulica" class="form-control" id="ulica" placeholder="Main St" required="" value="{{old("ulica")}}">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3">
                <label for="cislo_domu">Číslo domu</label>
                <input type="text" pattern="[0-9]+" name="cislo_domu" class="form-control" id="cislo_domu" placeholder="1234" required="" value="{{old("cislo_domu")}}">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3">
                <label for="mesto">Mesto</label>
                <input type="text" name="mesto" class="form-control" id="mesto" placeholder="Mesto" value="{{old("mesto")}}">
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="psc">PSČ</label>
                  <input type="text" name="psc" pattern="[0-9]{5}" class="form-control" id="psc" placeholder="99001" required="" value="{{old("psc")}}">
                  <div class="invalid-feedback">
                    Zip code required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="uzv_objednavok">Uzavierka</label>
                <input type="time" name="uzv_objednavok" step="2" class="form-control" id="uzv_objednavok" placeholder="hodina" value="{{old("uzv_objednavok")}}">
              </div>

                <div class="row">
                    <div class="col-md-10 mb-3">
                        <label for="popis">Interný limit denného menu</label>
                        <input type="text" pattern="[0-9]+" name="interny_limit" class="form-control"  placeholder="" value="{{old('interny_limit')}}" required="" autofocus>
                        <div class="invalid-feedback">
                            Vyplňte interný limit.
                        </div>
                    </div>
                </div>

              <div class="mb-3">
                  <label for="obrazok">Obrázok</label>
                  <input id="obrazok" type="file" class="btn @error('err') is-invalid @enderror" name="obrazok" value="{{ old('obrazok') }}" required autocomplete="obrazok">
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

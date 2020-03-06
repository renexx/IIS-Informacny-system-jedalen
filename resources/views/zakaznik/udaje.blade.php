@extends('headerUser')

@section('content')
<div class="tabulka">
    <div class="">

        <div class="col">
            @if ($message = Session::get('success'))
               <div class="alert alert-success alert-block">
                   <button type="button" class="close" data-dismiss="alert">×</button>
                   <strong>{{ $message }}</strong>
               </div>
            @endif
            @guest
            <h4 class="mb">Dodacia adresa</h4>
            <form action="{{route("objednavka.store")}}" method="POST" class="needs-validation" novalidate="">
              @csrf
                <input type="hidden" name="typ" value="{{$typ}}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Meno<span>*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="Zadajte meno" name="name" value="{{old('name')}}" required="" autofocus>
                        <div class="invalid-feedback">
                            Meno je povinné.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname">Priezvisko<span>*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Zadajte priezvisko" value="{{old('lastname')}}" required="">
                        <div class="invalid-feedback">
                            Priezvisko je povinné.
                        </div>
                    </div>
                </div>

                <input type="hidden" id="oznacenie" name="oznacenie" value="{{$prevadzka_id}}">
                <input type="hidden" id="id_jedlo" name="id_jedlo" value="{{$polozka_id}}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="ulica">Ulica<span>*</span></label>
                        <input type="text" class="form-control" id="ulica" name="ulica" placeholder="Názov ulice" value="{{old('ulica')}}" required="">
                        <div class="invalid-feedback">
                            Ulica je povinná.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cislo_domu">Číslo domu<span>*</span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" id="cislo_domu" name="cislo_domu" placeholder="1234" value="{{old('cislo_domu')}}" required="">
                        <div class="invalid-feedback">
                            Číslo domu je povinné.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mesto">Mesto<span>*</span></label>
                    <input type="text" class="form-control" id="mesto" name="mesto" placeholder="Mesto" value="{{old('mesto')}}">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="psc">PSČ<span>*</span></label>
                        <input type="text" pattern="[0-9]+" class="form-control" id="psc" name = "psc" placeholder="60200" required="" value="{{old('psc')}}">
                        <div class="invalid-feedback">
                          PSC je povinné.
                        </div>
                    </div>
                </div>

                <!-- <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info" onclick="change()">
                    <label class="custom-control-label" for="save-info">Zaregistrovať ma</label>
                    <div id="output" class=""></div>

                    <script type="text/javascript">
                        function change() {
                            var decider = document.getElementById('save-info');

                            if(decider.checked){

                                var codeblock = '<form method="POST" action="{{ route("register") }}">'+
                                    '@csrf'+
                                    '<div class="form-group row">'+
                                        '<label for="password" class="col-md-4 col-form-label text-md-right">{{ __("Heslo") }}</label>'+
                                        '<div class="col-md-6">'+
                                            '<input id="password" type="password" class="form-control" name="password" placeholder="zadajte heslo" required autocomplete="new-password">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="form-group row">'+
                                        '<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __("Zopakujte heslo") }}</label>'+
                                        '<div class="col-md-6">'+
                                            '<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="zopakujte heslo" required autocomplete="new-password">'+
                                        '</div>'+
                                    '</div>';
                                document.getElementById('output').innerHTML = codeblock;
                                document.getElementById('output2').innerHTML = '</form>';
                            } else {
                                document.getElementById('output').innerHTML = "";
                                document.getElementById('output2').innerHTML = "";
                            }
                        }
                    </script>
                </div>
                <hr class="mb-4">
                -->
                <div class="mb-3">
                    <label for="poznamka">Poznámka/telefónne číslo</label>
                    <input type="text" class="form-control" id="poznamka" name="poznamka" placeholder="" value="">
                </div>

                <h4 class="mb-3">Platba</h4>

                <div class="d-block my-3">

                    <div class="custom-control custom-radio">
                        <input id="debit" name="platba" value="hotovost" type="radio" class="custom-control-input" required="" checked>
                        <label class="custom-control-label" for="debit">V hotovosti kuriérovi</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="platba" value="karta" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">Kartou kuriérovi</label>
                    </div>
                </div>
                @else
                <form action="{{route("objednavka.store")}}" method="POST" class="needs-validation" novalidate="">
                  @csrf

                  <input type="hidden" id="id" name="id" value="{{Auth::user()->id}}">
                  <input type="hidden" id="name" name="name" value="{{Auth::user()->name}}">
                  <input type="hidden" id="lastname" name="lastname" value="{{Auth::user()->lastname}}">
                  <input type="hidden" id="ulica" name="ulica" value="{{Auth::user()->ulica}}">
                  <input type="hidden" id="cislo_domu" name="cislo_domu" value="{{Auth::user()->cislo_domu}}">
                  <input type="hidden" id="mesto" name="mesto" value="{{Auth::user()->mesto}}">
                  <input type="hidden" id="psc" name="psc" value="{{Auth::user()->psc}}">
                  <input type="hidden" id="oznacenie" name="oznacenie" value="{{$prevadzka_id}}">
                  <input type="hidden" id="polozkaJedlo" name="id_jedlo" value="{{$polozka_id}}">
                  <input type="hidden" name="typ" value="{{$typ}}">

                  <div class="mb-3">
                      <label for="poznamka">Poznámka</label>
                      <input type="text" class="form-control" id="poznamka" name="poznamka" placeholder="" value="" autofocus>
                  </div>
                <h4 class="mb-3">Platba</h4>

                <div class="d-block my-3">

                    <div class="custom-control custom-radio">
                        <input id="debit" name="platba" value="hotovost" type="radio" class="custom-control-input" required="" checked>
                        <label class="custom-control-label" for="debit">V hotovosti kuriérovi</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="platba" value="karta" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">Kartou kuriérovi</label>
                    </div>
                </div>
                @endguest

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Odoslať objednávku</button>
                <!-- <div id="output2" class=""></div> -->
            </form>
        </div>
    </div>
</div>
@stop

@extends('headerUser')
@section('content')
@if (Auth::user() || Auth::guard("administrator")->check() || Auth::guard("operatori")->check() || Auth::guard("vodici")->check())
<div>
    <div class="card-deck deck-vstup">
        <div class="card vstup">
            <a class="btn">Prosím najprv sa odhláste.</a>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrácia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Meno') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Zadajte meno" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Priezvisko') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="lastname" placeholder="Zadajte priezvisko" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ulica" class="col-md-4 col-form-label text-md-right">{{ __('Ulica') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="ulica" type="text" placeholder="Názov ulice" class="form-control @error('ulica') is-invalid @enderror" name="ulica" value="{{ old('ulica') }}" required autocomplete="ulica">

                                @error('ulica')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cislo_domu" class="col-md-4 col-form-label text-md-right">{{ __('Číslo domu') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="cislo_domu" placeholder="1234" type="text" pattern="[0-9]+" class="form-control @error('cislo_domu') is-invalid @enderror" name="cislo_domu" value="{{ old('cislo_domu') }}" required autocomplete="cislo_domu">

                                @error('cislo_domu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="psc" class="col-md-4 col-form-label text-md-right">{{ __('PSČ') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="psc" type="text" pattern="[0-9]{5}" class="form-control @error('psc') is-invalid @enderror" name="psc" value="{{ old('psc') }}" placeholder="99901"required autocomplete="psc">

                                @error('psc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mesto" class="col-md-4 col-form-label text-md-right">{{ __('Mesto') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="mesto" placeholder="Názov mesta" type="text" class="form-control @error('mesto') is-invalid @enderror" name="mesto" value="{{ old('mesto') }}" required autocomplete="mesto">

                                @error('mesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="you@example.com" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Heslo') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="zadajte heslo" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Zopakujte heslo') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" placeholder="zopakujte heslo" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zaregistrovať') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

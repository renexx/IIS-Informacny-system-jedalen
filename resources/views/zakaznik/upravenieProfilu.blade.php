@extends('headerUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              @if ($message = Session::get('success'))
                 <div class="alert alert-success alert-block">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
                 </div>
              @endif
                <div class="card-header">Upravenie profilu uživateľa {{$uzivatel->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route("uzivatel.update",["$uzivatel->id"]) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresa') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="you@example.com" value="{{ old('email') ?: $uzivatel->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Meno') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: $uzivatel->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Priezvisko') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?: $uzivatel->lastname }}" required autocomplete="lastname">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ulica" class="col-md-4 col-form-label text-md-right">{{ __('Ulica') }}</label>

                            <div class="col-md-6">
                                <input id="ulica" type="text" class="form-control @error('ulica') is-invalid @enderror" name="ulica" value="{{ old('ulica') ?: $uzivatel->ulica }}" required autocomplete="ulica">

                                @error('ulica')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="cislo_domu" class="col-md-4 col-form-label text-md-right">{{ __('Číslo domu') }}</label>

                            <div class="col-md-6">
                                <input id="cislo_domu" type="text" pattern="[0-9]+" class="form-control @error('cislo_domu') is-invalid @enderror" name="cislo_domu" value="{{ old('cislo_domu') ?: $uzivatel->cislo_domu }}" required autocomplete="cislo_domu">

                                @error('cislo_domu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="psc" class="col-md-4 col-form-label text-md-right">{{ __('PSČ') }}</label>

                            <div class="col-md-6">
                                <input id="psc" type="text" pattern="[0-9]{5}" class="form-control @error('psc') is-invalid @enderror" name="psc" value="{{ old('psc') ?: $uzivatel->psc }}" placeholder="99901"required autocomplete="psc">

                                @error('psc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mesto" class="col-md-4 col-form-label text-md-right">{{ __('Mesto') }}</label>

                            <div class="col-md-6">
                                <input id="mesto" type="text" class="form-control @error('mesto') is-invalid @enderror" name="mesto" value="{{ old('mesto') ?: $uzivatel->mesto }}" required autocomplete="mesto">

                                @error('mesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nové heslo') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Zopakujte nové heslo') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" minlength="8" class="form-control" name="password_confirmation" placeholder="zopakujte heslo" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upraviť profil') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

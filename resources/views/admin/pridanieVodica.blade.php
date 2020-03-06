@extends('admin-header')

@section('adminContent')
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
                <div class="card-header">Pridanie vodiča</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vodic.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="login" placeholder="vodic123" type="text" maxlength="35" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="meno" class="col-md-4 col-form-label text-md-right">{{ __('Meno') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="meno" placeholder="Zadajte meno" type="text" class="form-control @error('meno') is-invalid @enderror" name="meno" value="{{ old('meno') }}" required autocomplete="meno" autofocus>

                                @error('meno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priezvisko" class="col-md-4 col-form-label text-md-right">{{ __('Priezvisko') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="priezvisko" placeholder="Zadajte priezvisko" type="text" class="form-control @error('priezvisko') is-invalid @enderror" name="priezvisko" value="{{ old('priezvisko') }}" required autocomplete="priezvisko">

                                @error('priezvisko')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ulica" class="col-md-4 col-form-label text-md-right">{{ __('Ulica') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="ulica" placeholder="Názov ulice" type="text" class="form-control @error('ulica') is-invalid @enderror" name="ulica" value="{{ old('ulica') }}" required autocomplete="ulica">

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
                                <input id="mesto" placeholder="Názov miesta" type="text" class="form-control @error('mesto') is-invalid @enderror" name="mesto" value="{{ old('mesto') }}" required autocomplete="mesto">

                                @error('mesto')
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
                                    {{ __('Pridať vodiča') }}
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

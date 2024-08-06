@extends('layouts.app',[
    'ads'=>"hide"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-center text-muted">
            <h3 class="mt-4 ">Iniciar Sessão</h3>
            <p class="mb-0 ">Entre e siga os seus autores favoritos de perto, reviva as histórias mais interessantes, explore os artigos e blogs que se identifica, nos tópicos que adora.</p>
        </div>
        <div class="col-12 text-center mb-4">
            <a href="/register" class=" text-center" style="font-size: 0.8rem;"><u>Ainda não tem conta?</u></a>
        </div>
        <div class="col-sm-5 px-0">
            <form class="px-4" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" id="image" name="image" value="{{$image??null}}">

                <div class="form-group row">
                    <label for="email"
                        class="col-md-12 col-form-label text-left text-muted pb-0">{{ __('Email') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ?? $email ?? null}}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password"
                        class="col-md-12 col-form-label text-left text-muted pb-0">{{ __('Senha') }}</label>
                    <div class="col-md-12 ">
                        <input id="password" type="password" minlength="6"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="my-4 text-center">
                    <a class="btn btn-light border rounded-circle text-danger mx-3 "
                        style="height: 40px;width: 40px;padding: 0.5rem;" href="/redirect/google"><i class="fab fa-google"></i></a>
                    <a class="btn btn-light border rounded-circle text-primary mx-3 "
                        style="height: 40px;width: 40px;padding: 0.5rem;" href="/redirect/facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div>
                    <hr>
                </div>

                <div class="form-group row">
                        <div class="col-12 small text-center">
                            <span class="text-muted">Reconheço e
                                aceito os
                                <a href="#" data-toggle="modal" data-target="#service-terms">Termos de
                                    Serviço</a> & <a href="#" data-toggle="modal" data-target="#privacy-policy">Política
                                    de Privacidade.</a></span>
                        </div>
                    </div>
                <div class="form-group row mb-0 mt-4">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Iniciar Sessão <i class="fas fa-caret-right"
                                style="
                            font-size: 12px;
                        "></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/user/edit" enctype="multipart/form-data" method="POST">
        @csrf
        @method("PATCH")
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="text-center">Informações Perfil</h1>
                </div>

                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>Informações publicas</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">
                            <div class="line"></div>
                            <div class="form-group row  justify-content-center">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') ?? $user->name}}" maxlength="20" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="career"
                                    class="col-md-4 col-form-label">{{ __('Ocupação/Profissão') }}</label>

                                <div class="col-md-6">
                                    <input id="career" type="text" maxlength="20"
                                        class="form-control @error('career') is-invalid @enderror" name="career"
                                        value="{{ old('career') ?? $user->career}}" autofocus>
                                    @error('career')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="description" class="col-md-4 col-form-label">{{ __('Biografia') }}</label>

                                <div class="col-md-6">
                                    <textarea rows="2" id="description" maxlength="255"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description">{{ old('description') ?? $user->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 order-first order-md-last pt-3">
                            <div class="row">
                                <label for="image" class="col-12 col-form-label text-center">
                                    <img id="image-container" class="img-fluid img-thumbnail rounded-circle"
                                        style="height: 150px;width:150px;" src="{{$user->default_image()}}" alt="">
                                    <p class="pt-1 text-muted">Carregar imagem</p>
                                </label>
                                <div class="col-md-6 text-center">
                                    <input id="image" type="file"
                                        class="form-control-file @error('image') is-invalid @enderror collapse"
                                        name="image"
                                        onchange="
                                                         document.getElementById('image-container').src = window.URL.createObjectURL(this.files[0]) "
                                        accept="image/*">
                                    @error('image')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>Informações privadas</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') ?? $user->email}}" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="phone" class="col-md-4 col-form-label">{{ __('Telefone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') ?? $user->phone}}" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 ">
                    <p class="text-muted mb-0 mt-3"><small>Alterar senha</small></p>
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-md-9 col-lg-10 pt-4">

                            <div class="form-group row  justify-content-center">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Senha antiga') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="password" placeholder="************">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row  justify-content-center">
                                <label for="new_password" class="col-md-4 col-form-label">{{ __('Nova senha') }}</label>
                                <div class="col-md-6">
                                    <input id="new_password" type="password"
                                        class="form-control @error('new_password') is-invalid @enderror"
                                        name="new_password" autocomplete="new-new_password">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  justify-content-center">
                                <label for="confirm_password"
                                    class="col-md-4 col-form-label">{{ __('Confirme a nova senha') }}</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        name="confirm_password" autocomplete="new-password">
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2 "></div>
                    </div>
                    <hr class="p-1 mt-5">
                </div>
                <div class="col-12 col-sm-6 content text-left"><button type="button" data-toggle="modal"
                        data-target="#delete_model" class="btn btn-danger mt-4 mb-3">Apagar conta</button></div>
                <div class="col-12 col-sm-6 content text-right"><button type="submit"
                        class="btn btn-primary mt-4 mb-3">Salvar</button></div>
            </div>
        </div>
    </form>

    {{-- Modal for delete --}}
    <div id="delete_model" tabindex="-1" role="dialog" aria-labelledby="delete_modelTitle" class="modal fade"
        aria-modal="true">
        <div role="document" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <p class="pt-2 mb-0">Tem a certeza que deseja apagar a sua conta?</p>
                    <p class="pb-2 small text-muted">Se realizar esta operação, todos os seus dados seram apagados,
                        excepto os seus artigos</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 pb-2 border-top">
                                <form action="/user/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="btn btn-light w-100 bg-white border-0 text-danger">Apagar</button>
                                </form>

                            </div>
                            <div class="col-12 pb-2 border-top"><button type="button" data-dismiss="modal"
                                    class="btn btn-light w-100 bg-white border-0">Cancelar</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
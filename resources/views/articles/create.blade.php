@extends('layouts.app')


@section('content')
<form class="form-changes" action="/a" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1 class="text-center">Criar novo artigo</h1>
            </div>
            <div class="col-12 ">
                <div class="row">
                    <div class="col-12 col-md-8 pt-4">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" required autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" maxlength="255" class="col-md-4 col-form-label">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <textarea rows="2" id="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" required>{{ old('description') }}</textarea>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label">{{ __('Categoria') }}</label>
                            <div class="col-md-6">
                                <select id="category_id" class="form-control @error('category_id') is-invalid @enderror"
                                    name="category_id" value="{{ old('category_id') }}" required>
                                    
                                    @foreach ($categories as $category)
                            <option value="{{$category->id}}" title="{{$category->description}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-4 order-first order-md-last">
                        <div class="row">
                            <label for="image" class="col-12 col-form-label text-center">
                                <img id="image-container" class="img-fluid img-thumbnail" style="width:150px;height:150px;" src="/storage/default/default_article.png"
                                    alt="">
                                    <p class="pt-1 text-muted">Carregar imagem</p>
                            </label>
                            <div class="col-md-6 text-center">
                                <input id="image" type="file"
                                    class="form-control-file @error('image') is-invalid @enderror collapse" name="image"
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
                <hr>
            </div>
            <div class="col-12  pb-4 z-index-1000">
                <div class="row">
                    <label for="content" class="col-md-4 col-form-label">{{ __('Conteudo') }} <button id="options_btn" type="button"
                            class="btn btn-sm btn-light bg-white border bordered-circle" data-toggle="modal"
                            data-target="#exampleModalLong"><i class="fa fa-cog"></i></button></label>

                    <div class="col-12">
                        <textarea rows="10" id="content" class="form-control pr-5 @error('content') is-invalid @enderror"
                            name="content" required>{{ old('content')  }}</textarea>
                        <fullscreen el_id="content"></fullscreen>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 content text-right">
                <button type="submit" class="btn btn-primary mt-4 mb-3">Confirmar</button>
            </div>
        </div>
    </div>
</form>
<modal_options_article></modal_options_article>

@endsection


@section('image-file-update')
<script type="text/javascript">
    $("#image-container").click(function () {
        $("#image").trigger('click');
    })
</script>
@stop
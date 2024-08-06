@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row text-center">

        @if ($doesFollow==-1)
        <div class="col-12 text-center mb-3"><span class="text-muted "><a href="/register"><b>Registe-se</b></a> para
                desfrutar de tudo o que temos para oferecer. </span></div>
        @elseif ($doesFollow==0)
        <div class="col-12 text-center mb-3"><span class="text-muted ">Ainda não segue ninguem. Começe já a seguir
            </span><a href="/user"><b>aqui</b></a></div>
        @elseif(count($articlesFollow)<=0) <div class="col-12 text-center mb-3"><span class="text-muted ">Os autores que
                segue não têm artigos</span></div>
    {{-- @elseif(count($articlesFollow)>0)
    <div class="col-12 text-center mb-3"><span class="text-muted ">Artigos de autores que segue.</span></div> --}}
    @endif
    @auth
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mx-0 mb-3 article-user-item author-add-link flex-center">
        <a href="/a/create" class="h-100 w-100 p-5 text-center">
            <p class="mt-5" style="color: rgb(195, 195, 195);"><i class="fa fa-plus-circle"></i></p>
            {{-- <p>Adicionar novo artigo</p> --}}
        </a>
    </div>
    @endauth
    @if (count($articlesFollow)>0)
    @foreach($articlesFollow as $article)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 article-user-item px-1">
        <a href="/a/{{$article->id}}" class="text-muted">
            <div class="card h-100">
                <img class="card-img-top" src="{{$article->default_image()}}" alt="">
                <div class="card-body p-2">
                    <h5 class="card-title m-0"><strong>{{$article->title}}</strong></h5>
                    <p class="small mb-2"><time
                            class="entry-date updated ">{{explode(" ",$article->created_at)[0]}}</time></p>
                    <p class="card-text">
                        @if (strlen($article->description)>120)
                        {{substr($article->description,0,120)."..."}}
                        @else
                        {{$article->description}}
                        @endif
                    </p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    @endif

    @if (count($articlesFollow)<9 && count($articles)>0)
        @if ($doesFollow!=0)
        <div class="col-12 text-center mb-3"><span class="text-muted ">Artigos que poderá gostar</span></div>
        @endif

        @foreach($articles as $article)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 article-user-item px-1">
            <a href="/a/{{$article->id}}" class="text-muted">
                <div class="card h-100">
                    <img class="card-img-top" src="{{$article->default_image()}}" alt="">
                    <div class="card-body p-2">
                        <h5 class="card-title m-0"><strong>@if (strlen($article->title)>28)
                            {{substr($article->title,0,28)."..."}}
                            @else
                            {{$article->title}}
                            @endif
                            </strong></h5>
                        <p class="small mb-2"><time
                                class="entry-date updated ">{{explode(" ",$article->created_at)[0]}}</time></p>
                        <p class="card-text">
                            @if (strlen($article->description)>120)
                            {{substr($article->description,0,120)."..."}}
                            @else
                            {{$article->description}}
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-12 mt-4 d-flex justify-content-center">
            {{$articles->links()}}
        </div>
        @else
        <div class="col-12 mt-4 d-flex justify-content-center">
            {{$articlesFollow->links()}}
        </div>
        @endif
</div>
</div>
@endsection
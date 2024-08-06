@extends('layouts.app',["title"=>$user->name,"description"=>$user->description])

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        {{-- <div class="col-12 d-flex">
                    <button class="btn btn-light bg-white border btn-sm">Seguir</button>
                </div> --}}
        <div class="col-4 text-center">
        </div>
        <div class="col-4 col-md-2">
            <img class="img-fluid rounded-circle" src="{{$user->default_image()}}"
                alt="Imagem podera conter um photo do autor">
        </div>
        <div class="col-4 text-center">
            @cannot ("update",$user)
            @auth
            <follow user-id="{{$user->id}}" follows="{{$followState}}"></follow>
            @endauth
            @endcannot
            @can ("update",$user)
            <a href="/user/edit" class="btn btn-light border text-muted btn-sm mt-5">Editar</a>
            @endcan
        </div>

        <div class="col-12 text-center px-0">
            <h1 class="my-1 font-weight-bold" style="font-size: 1.575rem;">{{$user->name}} </h1>
        </div>

        <div class="col-8 text-center">
            <p class="mb-2">{{$user->career ?? " "}}</p>
        </div>
        <div class="col-12 text-center">
            <div>{{$user->description ?? " "}}</div>
        </div>
    </div>

    <ul class="classic-tabs nav mt-3 pb-2 mb-3 border-bottom justify-content-center" id="myClassicTab" role="tablist">
        {{-- <li class="nav-item mx-1">
            <a class="btn-style nav-link waves-light text-muted {{\Request::is("user/*/favorite")?"active show":""}}"
        id="follow-tab" href="/user/{{$user->id}}/{{"favorite"}}" role="tab" aria-controls="favorite-classic"
        aria-selected="false"><strong>4</strong> Favoritos</a>
        </li> --}}
        <li class="nav-item mx-1">
            <a class="btn-style nav-link  waves-light text-muted {{\Request::is("user/*/following")?"active show":""}}"
                id="favorite-tab" href="/user/{{$user->id}}/{{"following"}}" role="tab"
                aria-controls="following-classic" aria-selected="true"><strong>{{$followingCount}}</strong> Seguindo</a>
        </li>
        <li class="nav-item nav-link  text-muted mx-0 px-0">|</li>
        <li class="nav-item mx-1 ">
            <a class="btn-style nav-link waves-light text-muted {{\Request::is("user/*/author")|| !(\Request::is("user/*/following")) && !(\Request::is("user/*/followers"))?"active show":""}}"
                id="author-tab" href="/user/{{$user->id}}/{{"author"}}" role="tab" aria-controls="author-tab"
                aria-selected="false"><strong>{{$articlesCount}}</strong> Artigos</a>
        </li>
        <li class="nav-item nav-link  text-muted mx-0 px-0">|</li>
        <li class="nav-item mx-1">
            <a class="btn-style nav-link  waves-light text-muted {{\Request::is("user/*/followers")?"active show":""}}"
                id="favorite-tab" href="/user/{{$user->id}}/{{"followers"}}" role="tab"
                aria-controls="followers-classic" aria-selected="true"><strong>{{$followersCount}}</strong>
                Seguidores</a>
        </li>
    </ul>

    <!-- Content -->
    <div class="tab-content " id="myClassicTabContent">
        <!-- Author -->
        @if($tab==="author" || $tab===null)
        <div class="tab-pane collapse  active show" id="author-classic" role="tabpanel" aria-labelledby="favorite-tab">

            @if(count($articles)==0)
            <p class="text-center text-muted pt-1 mb-2">Ainda não tem artigos <b>┏(‘▀_▀’)ノ</b></p>
            @endif

            <div class="row text-center">

                @can("update",$user)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mx-0 mb-3 article-user-item author-add-link flex-center">
                    <a href="/a/create" class="h-100 w-100 p-5 text-center">
                        <p class="mt-5" style="color: rgb(195, 195, 195);"><i class="fa fa-plus-circle"></i></p>
                        {{-- <p>Adicionar novo artigo</p> --}}
                    </a>
                </div>
                @endcan
                @if(count($articles)>0)
                @foreach($articles as $article)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3 article-user-item px-1">
                    <a href="/a/{{$article->id}}" class="text-muted">
                        <div class="card h-100 border-0">
                            <img class="card-img-top" src="{{$article->default_image()}}" alt="">
                            <div class="card-body p-2">
                                <h5 class="card-title m-0"><strong>
                                        @if (strlen($article->title)>28)
                                        {{substr($article->title,0,28)."..."}}
                                        @else
                                        {{$article->title}}
                                        @endif</strong></h5>
                                <p><time class="entry-date updated">{{explode(" ",$article->created_at)[0]}}</time>
                                </p>

                                <p class="card-text">
                                    @if (strlen($article->description)>120)
                                    {{substr($article->description,0,120)."..."}}
                                    @else
                                    {{$article->description}}
                                    @endif</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                <div class="mt-4 d-flex justify-content-center">
                    {{$articles->links()}}
                </div>
                @endif
            </div>

        </div>
        @endif

        {{-- <!-- Favorits -->
        @if($tab==="favorite")
        <div class="tab-pane collapse active show " id="favorite-classic" role="tabpanel"
            aria-labelledby="favorite-tab">


            @if($user->articles->count()==0)
            <p class="text-center text-muted pt-1 mb-2">Não tem favoritos <b>┒(ˇ_ˇ)┎</b></p>
            @else
            <div class="row justify-content-center">
                @foreach($user->articles as $article)
                <div class="col-12 col-sm-6 col-md-4 mb-3 article-user-item px-1">
                    <a href="/a/{{$article->id}}" class="text-muted">
        <div class="card h-100">
            <img class="card-img-top" src="{{$article->default_image()}}" alt="">
            <div class="card-body p-2">
                <h5 class="card-title m-0"><strong>{{$article->title}}</strong></h5>
                <p><time class="entry-date updated">{{explode(" ",$article->created_at)[0]}}</time>
                </p>
                <p class="card-text">{{$article->description}}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>
@endif
</div>
@endif --}}

<!-- Following -->
@if($tab ==="following")
<div class="tab-pane collapse active show" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab">

    @if($followingCount==0)
    <p class="text-center text-muted pt-1 mb-2">Ainda não segue ninguem <b>ᕦ(ò_óˇ)ᕤ</b></p>
    @else

    <div class="row justify-content-center">
        @foreach($user->following as $follow)
        <div class="col-12 col-sm-6 col-lg-4 mb-3  profile-user-item px-1">
            {{-- <follow user-id="{{$user->id}}" follows="{{$follows}}"></follow> --}}
            <div class="card text-center  img-thumbnail m-1">
                <div class="card-body  h-100 bg-white py-0 px-0">
                    {{-- <div class=" text-white pt-1 pl-5 ml-5 py-2">
                                    <p class="m-0"><b>0</b> Seguidores</p>
                                    <p class="m-0"><b>0</b> Artigos</p>
                                </div>  --}}

                    <div class="container">
                        <div class="row py-2">
                            <div class="col-3">
                                <img src="{{$follow->default_image()}}" alt="Imagem de capa do card"
                                    class="card-img-top  mx-auto rounded-circle top-0 pt-1 w-100">
                            </div>
                            <div class="col-9 text-left">
                                <a href="/user/{{$follow->id}}" class="text-muted">
                                    <h5 class="card-title font-weight-bold pt-1 text-dark mb-0">{{$follow->name}}</h5>
                                </a>
                                <p class="text-muted small mb-0">
                                    @if (strlen($follow->career)===0)
                                    {{"Sem carreira"}}
                                    @else
                                    {{$follow->career}}
                                    @endif</p>
                            </div>
                        </div>

                        <div class="border-top pt-1 mt-1">
                            <p class="pt-0 mt-0 text-center small text-muted">
                                @if (strlen($follow->description)===0)
                                {{"Utilizador sem descrição"}}
                                @elseif (strlen($follow->description)>100)
                                {{substr($follow->description,0,100)."..."}}
                                @else
                                {{$follow->description}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


</div>
@endif
<!-- Followers -->
@if($tab==="followers")
<div class="tab-pane collapse active show" id="author-tab" role="tabpanel" aria-labelledby="awesome-tab-classic">

    @if($followersCount==0)
    <p class="text-center text-muted pt-1 mb-2">Ainda não tem seguidores <b>ޏ₍ ὸ.ό₎ރ</b></p>
    @else
    <div class="row justify-content-center">
        @foreach($user->followers as $follow)
        <div class="col-12 col-sm-6 col-lg-4 mb-3  profile-user-item px-1">
            {{-- <follow user-id="{{$user->id}}" follows="{{$follows}}"></follow> --}}
            <div class="card text-center  img-thumbnail m-1">
                <div class="card-body  h-100 bg-white py-0 px-0">
                    {{-- <div class=" text-white pt-1 pl-5 ml-5 py-2">
                                    <p class="m-0"><b>0</b> Seguidores</p>
                                    <p class="m-0"><b>0</b> Artigos</p>
                                </div>  --}}

                    <div class="container">
                        <div class="row py-2">
                            <div class="col-3">
                                <img src="{{$follow->default_image()}}" alt="Imagem de capa do card"
                                    class="card-img-top  mx-auto rounded-circle top-0 pt-1 w-100">
                            </div>
                            <div class="col-9 text-left">
                                <a href="/user/{{$follow->id}}" class="text-muted">
                                    <h5 class="card-title font-weight-bold pt-1 text-dark mb-0">{{$follow->name}}</h5>
                                </a>
                                <p class="text-muted small mb-0">
                                    @if (strlen($follow->career)===0)
                                    {{"Sem carreira"}}
                                    @else
                                    {{$follow->career}}
                                    @endif</p>
                            </div>
                        </div>

                        <div class="border-top pt-1 mt-1">
                            <p class="pt-0 mt-0 text-center small text-muted">
                                @if (strlen($follow->description)===0)
                                {{"Utilizador sem descrição"}}
                                @elseif (strlen($follow->description)>100)
                                {{substr($follow->description,0,100)."..."}}
                                @else
                                {{$follow->description}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
</div>
@endif

</div>
<!-- Classic tabs -->

</div>
@endsection
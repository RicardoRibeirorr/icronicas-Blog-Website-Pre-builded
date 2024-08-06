@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row text-center">

        @if (count($articles)<=0)
        <div class="col-12 text-center mb-3">
            <span class="text-muted ">Não existe artigos</span>
            <h4 class="display-4 pt-4 text-muted">(._.)</h4>
        </div>
    @endif
    @can("update",$user)
    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mx-0 mb-3 article-user-item author-add-link flex-center">
        <a href="/a/create" class="h-100 w-100 p-5 text-center">
            <p class="mt-5" style="color: rgb(195, 195, 195);"><i class="fa fa-plus-circle"></i></p>
            {{-- <p>Adicionar novo artigo</p> --}}
        </a>
    </div>
    @endcan
    @if (count($articles)>0)
    @foreach($articles as $article)
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
    
    <div class="col-12 mt-4 d-flex justify-content-center">
            {{$articles->links()}}
        </div>
    @endif

</div>
</div>
@endsection
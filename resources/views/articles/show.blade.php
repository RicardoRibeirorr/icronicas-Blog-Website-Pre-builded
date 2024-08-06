@extends('layouts.app',["title"=>$article->title,"description"=>$article->description])

@section('content')


<div class="chronic container h-100 w-100 ">
    <div class="card border-0 h-100 w-100 bg-light">
        <header>
            <div class="entry-image">
                <img crossorigin src="/storage/{{$article->image ?? "default/default_article.png"}}"
                    class="img-fluid h-100 w-100" alt="...">
                <!-- User info section -->
                @can ("update",$article)
                <a href="/a/edit/{{$article->id}}" class="btn btn-sm btn-light absolute top-0 right-0 mr-1 mt-1"><i
                        class="fa fa-edit"></i></a>
                @endcan
            </div>
            <h1 class="entry-title display-5 px-3 mb-0" style="text-align: left !important;">{{$article->title}}
                @can ("update",$article)
                <a href="/a/edit/{{$article->id}}" class="btn btn-sm btn-light text-primary"> Editar</a>
                @endcan
            </h1>
        </header>
        <div class="card-body p-0 border-0">
            <!-- Article info section -->
            <div class="entry-container bg-light px-3 pb-3">
                <!-- The Article info and description-->
                <div class="post-title author-image-on">
                    <div class="post-meta mb-3">
                        <ul>
                            <li><time class="entry-date updated"
                                    datetime="2019-04-25T09:00:32-03:00">{{explode(" ",$article->created_at)[0]}}</time>
                            </li>
                            <li class="divider">/</li>
                            <li>@foreach ($article->category()->get() as $category)
                                {{$category->name}}
                                @endforeach</li>
                            <li class="divider">/</li>
                            <li>{{$article->views}} <i class="fa fa-eye"></i></li>
                        </ul>
                    </div>
                    <p class="m-0 text-center">{{$article->description}}</p>
                </div>

                <!-- The Content -->
                <div class="entry-content card-text" style="opacity: 1;">
                        <?php $parsedown = new Parsedown(); $parsedown->setSafeMode(true); echo($parsedown->text($article->content)); ?>
                </div>

                <hr class="m-5">
                <!-- The Author -->
                @if ($article->user)
                <div class="container my-4 text-center">
                    <div class="row justify-content-left">
                        <figure class="col-4 offset-4 col-sm-2 offset-sm-5 d-flex align-items-center author  bg-light">
                            @if(auth()->user()!==null)
                            {{-- <follow icon=0 user-id="{{auth()->user()->id}}" follows="{{$follows}}" ></follow> --}}
                            @endif
                            <img src="{{$article->user->image ?? "default/default_user.png"}}"
                                alt="Imagem podera conter um photo do autor" class="img-fluid rounded-circle "></figure>
                        <div class="col-12 author py-1 bg-light">
                            <address rel="author" class="m-0 text-muted"><a href="/user/{{$article->user->id}}"
                                    class="text-primary">{{$article->user->name}}</a></address>
                            <p class="m-0 text-muted">
                                @if (strlen($article->user->description)===0)
                                {{"Autor não tem uma descrição"}}
                                @else
                                {{$article->user->description}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
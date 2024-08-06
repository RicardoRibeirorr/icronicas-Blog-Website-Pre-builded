@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-12 text-center pb-2">
            <span class="text-muted ">Encontre aqui os seus autores favoritos</span>
        </div>

        @foreach($users as $user)
        <div class="col-12 col-sm-6 col-lg-4 mb-4 mt-2  profile-user-item px-1">
            {{-- <follow user-id="{{$user->id}}" follows="{{$follows}}"></follow> --}}
            <div class="card text-center  img-thumbnail m-1">
                <div class="card-body  h-100 bg-white py-0 px-0">
                    {{-- <div class=" text-white pt-1 pl-5 ml-5 py-2">
                        <p class="m-0"><b>0</b> Seguidores</p>
                        <p class="m-0"><b>0</b> Artigos</p>
                    </div>  --}}

                    <div class="container">
                        <div class="row py-2">
                            <div class="col-2 pr-0">
                                <img src="{{$user->default_image()}}" alt="Imagem de capa do card"
                                    class="card-img-top  mx-auto rounded-circle top-0 pt-1 w-100">
                            </div>
                            <div class="col-10 text-left">
                                <a href="/user/{{$user->id}}" class="text-muted">
                                    <h5 class="card-title font-weight-bold pt-1 text-dark mb-0">{{$user->name}}</h5>
                                </a>
                                <p class="text-muted mb-0">
                                    @if (strlen($user->career)===0)
                                    {{"Sem carreira"}}
                                    @else
                                    {{$user->career}}
                                    @endif</p>
                            </div>
                        </div>

                        <div class="border-top pt-1 mt-1">
                            <p class="pt-0 my-0 text-center small text-muted " >
                                @if (strlen($user->description)===0)
                                {{"Utilizador sem descrição"}}
                                @elseif (strlen($user->description)>100)
                                {{substr($user->description,0,100)."..."}}
                                @else
                                {{$user->description}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{$users->links()}}
    </div>
    <!-- Classic tabs -->
</div>
@endsection
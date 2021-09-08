@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>{{$article->title}}</h1>
        <div>Creado el:{{$article->created_at}}</div>
        <div>
            @foreach($article->tags()->get() as $tag)
            <span>{{$tag->name}}</span>
            @endforeach
        </div>
        <div>
            <a href="" class="btn btn-warning">Modificar</a>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <img src="{{$article->img}}" alt="">
        <p>{{$article->text}}</p>
    </div>
</div>


@endsection

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
            <a href="{{route('articles.edit',['id'=>$article->id])}}" class="btn btn-warning">Modificar</a>
            <form action="{{route('articles.destroy',['id'=>$article->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <img src="{{$article->img}}" alt="" class="img-fluid">
        <p>{{$article->text}}</p>
    </div>
</div>


@endsection

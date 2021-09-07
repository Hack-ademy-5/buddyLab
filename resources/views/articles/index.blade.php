@extends('layouts.app')
@section('content')
<div class="row">

    <div class="col-12">
        <h1>Todos los articulos</h1>
    </div>
</div>
<div class="row">
    @foreach ($articles as $article)
    <div class="col-12 col-md-3">
        <div class="card" style="width: 18rem;">
            <img src="{{$article->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
               
                <a href="#" class="btn btn-primary">Ver mas</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Título</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="title" value="{{old('title')}}">
                @error('title')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="img" value="{{old('img')}}">
                @error('img')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea name="text" id="" cols="30" rows="10" class="form-control">{{old('text')}}</textarea>
                @error('text')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>    
                    @endforeach
                </select>
                @error('tags')
                {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</div>
@endsection

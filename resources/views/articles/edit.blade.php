@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <form method="POST" action="{{route('articles.update',['id'=>$article->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Título</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="title" value="{{old('title') ?? $article->title}}">
                @error('title')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="img" value="{{old('img') ?? $article->img}}">
                @error('img')
                {{$message}}
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Texto</label>
                <textarea name="text" id="" cols="30" rows="10" class="form-control">{{old('text') ?? $article->text}}</textarea>
                @error('text')
                {{$message}}
                @enderror
            </div>
           
            <div class="mb-3">
                <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        @if(old('tags'))
                            @if(in_array($tag->id,old('tags')))
                                 selected   
                            @endif
                        @elseif($article->tags->contains($tag))
                                selected   
                        @endif
                    >{{$tag->name}}</option>  
                    @endforeach

                    {{-- @foreach ($tags as $tag)
                        @foreach ($article->tags as $mitag)
                            <option value="{{$tag->id}}" @if($tag->id == $mitag->id)selected @endif>{{$tag->name}}</option>    
                        @endforeach
                    @endforeach --}}
                </select>
                @error('tags')
                {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</div>
@endsection

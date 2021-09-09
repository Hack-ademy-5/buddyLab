<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles = Article::all();

       return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all();
        return view('articles.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'text'=>'required',
            'img'=>'required|image',
            'tags'=>'required'
        ]);
       
        // guardar el archivo en nuestra memoria
        $path = $validatedData['img']->store('public/articles');
        $validatedData['img'] = $path;
        //Guardamos el articulo con mass assignement
        $article = Article::create($validatedData);
        
        // para cada id recuperado desde el formulario lo attach 
        // foreach ($validatedData['tags'] as $tagId) {
        //     $article->tags()->attach($tagId);
        // }
        
        // a partir del array de ids sincroniza el estado de la tabla article_tag
        $article->tags()->sync($validatedData['tags']);

        return redirect()->route('home')->withMessage('Artículo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(!$article = Article::find($id)){
        //     return redirect()->route('home')->withMessage("Articulo no encontrado");
        // }
        
        $article = Article::findOrFail($id);
       
        // return view('articles.show',compact('article'));
        return view('articles.show',['article'=>$article]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::all();
        return view('articles.edit',compact('article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $validatedData = $request->validate([
            'title'=>'required',
            'text'=>'required|min:5',
            'img'=>'image',
            'tags'=>'required'
        ]);
        
        if(isset($validatedData['img'])){
            $path = $validatedData['img']->store('public/articles');
            $validatedData['img'] = $path;
            // borrar la vieja imagen
            Storage::delete($article->img);
        }

        $article->update($validatedData);

        $article->tags()->sync($validatedData['tags']);

        return redirect()->route('articles.show',['id'=>$id])->withMessage("Articulo actualizado!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('articles.index')->withMessage('Articulo eliminado');
    }
}

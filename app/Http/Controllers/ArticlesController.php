<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
        // Show single resource
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function index()
    {
        // Render list of resource
        $articles = Article::latest()->get();
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        // Shows a view to create a new resource
        return view('articles.create');
    }

    public function store() 
    {
        // Persist a new resource
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    public function edit()
    {
        // Show a view to edit an existing resource
    }

    public function update() 
    {
        // Persist the edited resource
    }

    public function destroy()
    {
        // Delete the resource
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        // Show single resource
        return view('articles.show', compact('article'));
    }

    public function index()
    {
        // Render list of resource
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
        
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        // Shows a view to create a new resource
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store() 
    {
        // Persist a new resource

        //Article::create($this->validateArticle());
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));
        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        // Show a view to edit an existing resource
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article) 
    {
        // Persist the edited resource

        $article->update($this->validateArticle());
        return redirect(route('articles.show', $article));
    }

    public function destroy()
    {
        // Delete the resource
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}

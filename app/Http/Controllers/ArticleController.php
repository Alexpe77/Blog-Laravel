<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles()
    {
        $articles = Article::all();

        return view('articles', ['articles' => $articles]);
    }

    public function getArticleById($id)
    {
        $article = Article::find($id);

        return view('article', ['article' => $article]);
    }

    public function createArticle()
    {

        return view('create');
    }

    public function store()
    {
        $attributes = request()->validate([
             'title' => 'required|min:3|max:255|unique:articles',
             'author' => 'required|min:2|max:255',
             'content' => 'required|min:2|max:1000',
         ]);

         $attributes['publish_date'] = now();
         $attributes['picture'] = 'default.jpg';

        Article::create($attributes);

        $title = request('title');
        $author = request('author');
        $content = request('content');

        $article = new Article();
        $article->title = $title;
        $article->author = $author;
        $article->content = $content;
        $article['publish_date'] = now();
        $article['picture'] = 'default.jpg';

        $article->save();

        return redirect('articles')->with('success', 'Your article has been added successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticles(){
    $articles = Article::all();

    return view('articles', ['articles' => $articles]);
    }

    public function getArticleById($id){
    $article = Article::find($id);

    return view('article', ['article' => $article]);
    }

    public function createArticle() {

        return view('create');
   }
}

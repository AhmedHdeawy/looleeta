<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use App\Article;
use App\Category;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('articles_id', 'desc')->paginate(10);
        $categoriesSearch = Category::get();

        return view('admin.pages.articles.index', compact('articles', 'categoriesSearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::pluck('categories_name', 'categories_id');
        
        return view('admin.pages.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        
        $request['articles_slug'] = ($this->lastIDWithIncreament()).'-'.str_slug($request->articles_title);
        
        Article::create($request->all());
        
        return redirect()->route('articles.index');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrfail($id);

        return view('admin.pages.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        
        $categories = Category::pluck('categories_name', 'categories_id');

        return view('admin.pages.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        // dd($request->all());
        $request['articles_slug'] = $id.'-'.str_slug($request->articles_title);

        $article = Article::find($id)->update($request->all());

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id)->delete();

        return redirect()->route('articles.index');
        
    }

    public function search(Request $request)
    {
        // dd($request->all());

        $data = [
            'title'     =>  $request->title,
            'category'  =>  $request->category,
            'user'      =>  $request->user
        ];

        $articles = Article::orderBy('articles_id', 'desc');
        if($request->title) {

           $articles->where('articles_title', 'like', '%'.$request->title.'%');
        }

        if($request->user) {

            $articles->join('users', 'articles.users_id', 'users.id')
                    ->where('users.name', 'like', '%'.$request->user.'%');
        }

        if($request->category) {

            $articles->where('categories_id', '=', $request->category);
        }
        
        // dd($articles->get());

        $articles = $articles->paginate(10);
        $categoriesSearch = Category::get();
        
        return view('admin.pages.articles.index', compact('articles', 'categoriesSearch', 'data'));

    }

    /**
     * get last article ID
     */
    public function lastIDWithIncreament()
    {
        return Article::orderBy('articles_id', 'desc')->value('articles_id') + 1;
    }
}

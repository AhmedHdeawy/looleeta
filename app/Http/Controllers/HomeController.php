<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Auth;

use App\Category;
use App\Article;
use App\Ads;
use App\Setting;
use App\Comment;
use App\Like;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              
        $sliderArticles = Article::limit(5)->orderBy('articles_id', 'desc')->get();
        

        $categories = Category::get();
        $numbers = [];
        // get categories that have most articles
        foreach ($categories as $category) {
           $numbers[$category->categories_id] = $category->articles->count();
        }

        // sort array inrevers to get [ 'id' => articles Count ]
        arsort($numbers);

        // store all categories descinding
        $i = 1;
        $topCategory = [];
        foreach ($numbers as $key => $value) {
            
            if (Category::find($key)->articles->count() > 0) {
                
                $topCategory[] = Category::find($key);
            }
        }
        
        return view('front.pages.home', compact('sliderArticles', 'topCategory'));
    }

    /**
    *   Show Article Page
    */
    public function article(Request $request, $articles_slug)
    {

        $article = Article::where('articles_slug', $articles_slug)->first();
        
        return view('front.pages.article', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addArticle()
    {
        $categoriesBluck = Category::pluck('categories_name', 'categories_id');
        
        return view('front.pages.addArticle', compact('categoriesBluck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeArticle(ArticleRequest $request)
    {
        
        $request['articles_slug'] = ($this->lastIDWithIncreament()).'-'.str_slug($request->articles_title);
        
        $article = Article::create($request->all());
        
        return redirect()->route('article', $article->articles_slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editArticle($id)
    {
        $article = Article::where('articles_id', $id)->where('users_id', auth()->user()->id)->first();
        
        if($article) {

            $categoriesBluck = Category::pluck('categories_name', 'categories_id');

            return view('front.pages.editArticle', compact('article', 'categoriesBluck'));

        } else {
            return abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateArticle(ArticleRequest $request, $id)
    {
        // dd($request->all());
        $request['articles_slug'] = $id.'-'.str_slug($request->articles_title);

        Article::find($id)->update($request->all());

        $article = Article::find($id);

        return redirect()->route('article', $article->articles_slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteArticle($id)
    {
        $article = Article::where('articles_id', $id)->where('users_id', auth()->user()->id)->first();
        
        if($article) {

            $article->delete();
            return redirect()->route('home');

        } else {
            return abort(404);
        }

    }

    /**
    *   Show Article Page
    */
    public function searchArticle(Request $request)
    {

        $articles = Article::where('articles_title', 'like', '%'.$request->q.'%')->paginate(10);
        
        return view('front.pages.category', compact('articles'));
    }

    /**
     * get last article ID
     */
    public function lastIDWithIncreament()
    {
        return Article::orderBy('articles_id', 'desc')->value('articles_id') + 1;
    }

    /**
    *   Show Category Page
    */
    public function category(Request $request, $categories_slug)
    {
        $category = Category::where('categories_slug', $categories_slug)->first();
        
        $articles = $category->articles()->orderBy('articles_id', 'desc')->paginate(10);
        
        
        return view('front.pages.category', compact('category', 'articles'));
    }

    /**
     * like article
     * @param  Request $request [IDs]
     */
    public function like(Request $request)
    {
        if($request->ajax()) {

            if(Auth::check()) {
                
                $userID = auth()->user()->id;
                $articleID = $request->articleID;
                // dd("kds");
                
                $isExist = Like::where('users_id', $userID)->where('articles_id', $articleID)->first();
                if($isExist) {

                    Like::where('users_id', $userID)->where('articles_id', $articleID)->delete();

                    return response()->json(['dislike' => 'disliked']);

                } else {
                    
                    Like::create(['users_id' => $userID, 'articles_id' => $articleID]);
                    
                    return response()->json(['like' => 'liked']);
                    
                }

            } else {

                // if not user logged
                return response()->json(['auth' => 'no permission']);
            }

            return response()->json(['error' => 'errors happened']);
            
            
        }
    }

    /**
     * new comment 
     * @param  Request $request [IDs]
     */
    public function addComment(Request $request)
    {
        if($request->ajax()) {

            if(Auth::check()) {
                
                $userID = auth()->user()->id;
                $articleID = $request->articleID;
                $commentDesc = $request->commentDesc;
                // dd("kds");
                
                $newComment = Comment::create([
                        'users_id' => $userID, 
                        'articles_id' => $articleID, 
                        'comments_desc' => $commentDesc
                    ]);

            $dateTime = \Carbon\Carbon::createFromTimeStamp(strtotime($newComment->created_at))->diffForHumans();
            $userName = $newComment->user->name;
            $userImage = asset('images/users/'.$newComment->user->image);
            $commentText = $newComment->comments_desc;
            $commentID = $newComment->comments_id;

                return response()->json([
                        'success' => 'commented', 
                        'dataTime' => $dateTime,
                        'userName'  => $userName,
                        'userImage' => $userImage,
                        'commentText' => $commentText,
                        'commentID' =>  $commentID,
                        ]);

            } else {

                return abort(403);
            }

            return response()->json(['error' => 'errors happened']);
            
            
        }
    }

    /**
     * new comment 
     * @param  Request $request [IDs]
     */
    public function editComment(Request $request)
    {
        if($request->ajax()) {

            if(Auth::check()) {
                
                $userID = auth()->user()->id;
                $commentID = $request->commentID;
                $commentDesc = $request->commentDesc;
                // dd($commentID, $commentDesc);
                
                $newComment = Comment::find($commentID);
                $newComment->comments_desc = $commentDesc;
                $newComment->created_at = date('Y-m-d H:i:s');
                $newComment->save();
                // Update Created_at to Update_at that is current datetime

            $dateTime = \Carbon\Carbon::createFromTimeStamp(strtotime($newComment->updated_at))->diffForHumans();
            $commentText = $newComment->comments_desc;

                return response()->json([
                        'success' => 'commented', 
                        'dataTime' => $dateTime,
                        'commentText' => $commentText,
                        ]);

            } else {

                return abort(403);
            }

            return response()->json(['error' => 'errors happened']);
            
            
        }
    }

    /**
     * delete comment 
     * @param  Request $request [IDs]
     */
    public function deleteComment(Request $request)
    {
        if($request->ajax()) {

            if(Auth::check()) {
                
                $commentID = $request->commentID;
                
                $newComment = Comment::find($commentID)->delete();

                return response()->json([
                        'success' => 'deleted',
                        ]);

            } else {

                return abort(403);
            }

            return response()->json(['error' => 'errors happened']);
            
            
        }
    }

    /**
    *   Show Profile Page
    */
    public function profile(Request $request)
    {
        return view('front.pages.profile');
    }

    /**
    *   Show ContactUs Page
    */
    public function contact(Request $request)
    {
        return view('front.pages.contact');
    }
}

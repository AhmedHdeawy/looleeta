<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['index', 'article']]);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
         // dd(auth()->user()->name);
        
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
    *   Show Category Page
    */
    public function category(Request $request, $categories_slug)
    {
        $category = Category::where('categories_slug', $categories_slug)->first();
        
        $articles = $category->articles()->paginate(10);
        
        
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

                return response()->json([
                        'success' => 'commented', 
                        'dataTime' => $dateTime,
                        'userName'  => $userName,
                        'userImage' => $userImage,
                        'commentText' => $commentText,
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

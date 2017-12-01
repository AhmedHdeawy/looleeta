<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $categoriesSearch = Category::get();

        return view('admin.pages.categories.index', compact('categories', 'categoriesSearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents = Category::pluck('categories_name', 'categories_id');
        $parents['0'] = null;
        
        return view('admin.pages.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if($request->parents_id == 0) {
            $request['parents_id'] = null;
        }
        $request['categories_slug'] = str_slug($request->categories_name);

        // dd($request->all());
        Category::create($request->all());
        
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        
        $parents = Category::pluck('categories_name', 'categories_id');
        $parents['0'] = null;
        // dd($parents);

        return view('admin.pages.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // dd($request->all());
        if($request->parents_id == 0) {
            $request['parents_id'] = null;
        }
        $request['categories_slug'] = str_slug($request->categories_name);
        
        $category = Category::find($id)->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('categories.index');
        
    }

    public function search(Request $request)
    {

        $data = [
            'name'  =>  $request->name,
            'parent' =>  $request->parent
        ];

        $categories = Category::orderBy('categories_id', 'desc');
        if($request->name) {

           $categories->where('categories_name', 'like', '%'.$request->name.'%');
        }

        if($request->parent) {

            $categories->where('parents_id', '=', $request->parent);
        }

        $categories = $categories->paginate(10);
        $categoriesSearch = Category::get();
        
        return view('admin.pages.categories.index', compact('categories', 'categoriesSearch', 'data'));

    }
}

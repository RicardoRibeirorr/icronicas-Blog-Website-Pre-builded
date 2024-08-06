<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Category;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except([ 'show',"index"]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest() ){
            $articles = Article::select("id","views","title","image","user_id","created_at","description")->orderBy("views","DESC")->latest()->paginate(9);
            $doesFollow = -1;
        }else{
            $users = auth()->user()->following->pluck('id')->toArray();
            $doesFollow= count($users)>0?1:0;
            $articlesFollow = Article::select("id","user_id","views","title","image","created_at","description")->whereIn("user_id",$users)->latest()->paginate(9);
            if(count($articlesFollow)<9){
                    $articles = Article::select("id","views","title","image","user_id","created_at","description")->whereNotIn('user_id', array_merge($users,[auth()->user()->id]))->orderBy("views","DESC")->latest()->paginate(9-count($articlesFollow));
            }
        }
        return view("articles/index",["articles"=>$articles??[],"articlesFollow"=>$articlesFollow??[],"doesFollow"=>$doesFollow]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("articles/create",["categories"=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            "title"=>["required","string","max:60"],
            "description"=>["required","string","max:255"],
            "content"=>["required","string","min:255"],
            "image"=>"image",
            "category_id"=>"required",
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('article', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }
        $article = auth()->user()->articles()->create(array_merge($data,$imageArray ?? []));
        return redirect()->action('ArticleController@show',["article"=>$article->id]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->update(["views"=>$article->views+1]);
        return view("articles/show",["article"=>$article,"user"=>auth()->user()]);  
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view("articles/edit",["article"=>$article,"categories"=>Category::all()]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $this->authorize('update', $article);

        $data = request()->validate([
            "title"=>["required","string","max:60"],
            "description"=>["required","string","max:255"],
            "content"=>["required","string","min:255"],
            "image"=>"image",
            "category_id"=>"required",
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('article', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];

            $path = "/public/".$article->image;
            if(Storage::disk('local')->exists($path)) {
                Storage::delete($path);
            }
        }
        $article->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect()->action('ArticleController@show',["article"=>$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('update', $article);
        $path = "/public/".$article->image;
        if(Storage::disk('local')->exists($path)) {
            Storage::delete($path);
        }
        
        $article->delete();

        return redirect("/user/".auth()->user()->id);
    }
}

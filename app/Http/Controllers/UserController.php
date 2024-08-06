<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\User;
use App\Article;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([ 'show','ownArticles']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=!(auth()->user()===null || auth()->user()->following()->count()<=0);
        if(auth()->guest() || !$status){
            $users = (new User())->noted_follower()->paginate(12);
            if(count($users)<=4)
                $users = User::paginate(12);
        }else{
             $following = auth()->user()->following()->pluck("follow_id")->all();
             $id = auth()->user()->id;
             $users = (new User())->noted_follower()->whereNotIn("follow_id",array_merge($following,[intval( $id)]))->paginate(12);
        }
        return view("users/index",["status"=>$status,"users"=>$users]);  
    }

    public function ownArticles(User $user){
        return view("users/articles",["articles"=>$user->articles()->paginate(9),"user"=>$user]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$tab = null)
    {
        return view("users/show",[
            "user"=>$user,
            "followState"=>(auth()->user()) ? auth()->user()->following->contains($user->id) : false,
            "followingCount"=>$user->following()->count(),
            "followersCount"=>$user->followers()->count(),
            "articlesCount"=>$user->articles()->count(),
            "tab"=>$tab,
            "articles"=>$tab==null||$tab=="author"? Article::select("id","user_id","views","title","image","created_at","description")->where("user_id",$user->id)->latest()->paginate(9): []        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $this->authorize('update', auth()->user());
        return view("users/edit",["user"=>auth()->user()]);          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $this->authorize('update', auth()->user());

        $data = request()->validate([
            "name"=>"required",
            "career"=>"max:60",
            "phone"=>"max:20",
            "description"=>"max:255",
            "email"=>["email","required","max:100"],
        ]);
        if (request('image')!=null) {
            request()->validate([
                "image"=>"image",
            ]);
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();
            $imageArray = ['image' => "/storage/".$imagePath];

            $path = "/public/".auth()->user()->image;
            if(Storage::disk('local')->exists($path)) {
                Storage::delete($path);
            }
            
        }
        if (request()->password!=null  && request()->new_password!=null && request()->confirm_password!=null){
            $validatedData = request()->validate([
                'password' => 'required|min:8',
                'new_password' => 'required|string|min:8',
                'confirm_password' => 'required|same:new_password',
            ],[
                'password.required' => 'Old password is required',
                'password.min' => 'Old password needs to have at least 6 characters',
                'new_password.required' => 'new_password is required',
                'new_password.min' => 'new_password needs to have at least 6 characters',
                'confirm_password.required' => 'Passwords is reuired',
                'confirm_password.same' => 'Passwords do not match',
            ]);
            $data["password"] = bcrypt(validatedData["new_password"]);
        }
        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect()->back()->with("success","Dados actualizados con sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('update', $user);
        $path = "/public/".$user->image;
        if(Storage::disk('local')->exists($path)) {
            Storage::delete($path);
        }

        DB::table('users_users')->where('user_id', '=', $user->id)->delete();
        DB::table('users_users')->where('follow_id', '=', $user->id)->delete();
        $user->delete();
        return redirect()->action('ArticleController@index');

    }
}

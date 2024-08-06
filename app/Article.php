<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ["content","title","image","description","views","category_id"];

    public function user(){
        return $this->belongsTo("App\User");
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function withoutContent(){
        return $this->select("id","title","created_at","description","category_id")->orderBy("views","DESC")->latest()->paginate(9);
    }
    
    public function default_image(){
        if($this->image==null)
            return "/storage/default/default_article.png";
        return "/storage/".$this->image;
    }
}

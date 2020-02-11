<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
class AuthorController extends Controller
{
    public function profile($username)
    {
        $author = User::where('username',$username)->first();
        $posts = $author->posts()->approved()->published()->get();
        foreach($posts as $item){
            $getid=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
              // array_push($item,["tag",$getid]);
                  $item["categorie"]=$getid;
          }
        return view('profile',compact('author','posts'));
    }
}

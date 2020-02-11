<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class PostController extends Controller
{

    public function index()
    {
        $last=Post::latest()->approved()->published()->first();
        $gettaglast=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$last->id)->first();
        $last["categorie"]=$gettaglast;
        $id=$last->user_id;
        $publisher=DB::table('users')->find($id);
        $posts = Post::latest()->approved()->published()->paginate(6);
        foreach($posts as $item){
          $getid=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
            // array_push($item,["tag",$getid]);
                $item["categorie"]=$getid;
        }
   
        return view('posts',compact('posts','last','publisher'));
    }
    public function details($slug,$plug)
    {   
       
            error_log($plug);
        
        
        $post = Post::where('slug',$plug)->approved()->published()->first();
             
        $blogKey = 'blog_' . $post->id;

        if (!Session::has($blogKey)) {
            $post->increment('view_count');
            Session::put($blogKey,1);
        }
        $randomposts = Post::approved()->published()->take(3)->inRandomOrder()->get();
        foreach($randomposts as $item){
            $getid=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
              // array_push($item,["tag",$getid]);
                  $item["categorie"]=$getid;
          }

        return view('post',compact('post','randomposts'));

    }

    public function postByCategory($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->approved()->published()->get();
        return view('category',compact('category','posts'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }
}

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
    public function generatesitemap(){
        $posts=DB::table('posts')->get();
        $xmldoc = new \DOMDocument();

                //   $xmldoc->encoding = 'utf-8';
          
                //   $xmldoc->xmlVersion = '1.0';
          
                //   $xmldoc->formatOutput = true;
          
        //             $xml_file_name = 'sitemap.xml';
        //             $root = $dom->createElement('urlset');
                   
        //             $url_node = $dom->createElement('url');
        //             $child_node_title = $dom->createElement('loc',"blog.secteurprive.ma");
        //             $url_node->appendChild($child_node_title);
  
        //             $child_node_freq = $dom->createElement('changefreq','daily');
        //             $url_node->appendChild($child_node_freq);
  
        //             $child_node_priority = $dom->createElement('priority',"1.0");
        //             $url_node->appendChild($child_node_priority);
        //             $root->appendChild($url_node);
        //             $dom->appendChild($root);


        //             $url_node = $dom->createElement('url');
        //             $child_node_title = $dom->createElement('loc',"blog.secteurprive.ma/posts");
        //             $url_node->appendChild($child_node_title);
  
        //             $child_node_freq = $dom->createElement('changefreq','daily');
        //             $url_node->appendChild($child_node_freq);
  
        //             $child_node_priority = $dom->createElement('priority',"1.0");
        //             $url_node->appendChild($child_node_priority);
        //             $root->appendChild($url_node);
        //             $dom->appendChild($root);
        // foreach($posts as $item){
        //     $getcategory=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
        //       // array_push($item,["tag",$getid]);
         
        //           $item->categorie=$getcategory;
        //           $link='blog.secteurprive.ma/'.$item->categorie->name.'/'.str_slug($item->slug);
        //           $url_node = $dom->createElement('url');
        //           $child_node_title = $dom->createElement('loc',$link);
        //           $url_node->appendChild($child_node_title);

        //           $child_node_freq = $dom->createElement('changefreq','daily');
        //           $url_node->appendChild($child_node_freq);

        //           $child_node_priority = $dom->createElement('priority',"1.0");
        //           $url_node->appendChild($child_node_priority);
        //           $root->appendChild($url_node);
        //           $dom->appendChild($root);




        //   }
        
        //   $dom->save($xml_file_name);
        //   echo "$xml_file_name has been successfully created";

        //   $source="/Users/zakarialhna/Downloads/Blog-System-in-Laravel-master/public/sitemap.xml";
        //   $dest="/Users/zakarialhna/Desktop/sitemap/sitemap.xml";
        //   $res=copy ($source ,$dest );
        //     if ($res) {
        //        echo "File has been successfully Copied";
        //     }else{
        //         echo "File has failed";

        //     }
        // $myfile = fopen($dest, "a");
        // $newdata = file_get_contents($source);
        // fwrite($myfile, $newdata);
        // fclose($myfile);
        $source="/Users/zakarialhna/Downloads/Blog-System-in-Laravel-master/public/sitemap.xml";
        $dest="/Users/zakarialhna/Desktop/sitemap/sitemap.xml";
// $xmldoc->preserveWhiteSpace = false;
//     $xmldoc->formatOutput = true;
         $xml = file_get_contents($dest);  
            $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );
            // $xmldoc=simplexml_load_file($dest);
            $root = $xmldoc->getElementsByTagName('urlset')->item(0);
            $url_node = $xmldoc->createElement('url');
                        $child_node_title = $xmldoc->createElement('loc',"blog.secteurprive.ma");
                        $url_node->appendChild($child_node_title);
      
                        $child_node_freq = $xmldoc->createElement('changefreq','daily');
                        $url_node->appendChild($child_node_freq);
      
                        $child_node_priority = $xmldoc->createElement('priority',"1.0");
                        $url_node->appendChild($child_node_priority);
                        $root->appendChild($url_node);
                        $xmldoc->appendChild($root);
                        
            foreach($posts as $item){
                $getcategory=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
                  // array_push($item,["tag",$getid]);
             
                      $item->categorie=$getcategory;
                      $link='blog.secteurprive.ma/'.$item->categorie->name.'/'.str_slug($item->slug);
                      $url_node = $xmldoc->createElement('url');
                      $child_node_title = $xmldoc->createElement('loc',$link);
                      $url_node->appendChild($child_node_title);
    
                      $child_node_freq = $xmldoc->createElement('changefreq','daily');
                      $url_node->appendChild($child_node_freq);
    
                      $child_node_priority = $xmldoc->createElement('priority',"1.0");
                      $url_node->appendChild($child_node_priority);
                      $root->appendChild($url_node);
                      $xmldoc->appendChild($root);
    
    
    
    
              
              $xmldoc->save($dest);



        }

    }

    public function index()
    {
        $last=Post::latest()->approved()->published()->first();
        error_log(gettype($last));
        if ($last !== NULL) {
        $gettaglast=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$last->id)->first();
        $last["categorie"]=$gettaglast;
        $id=$last->user_id;    
        $publisher=DB::table('users')->find($id);
     
   
        return view('posts',compact('posts','last','publisher'));
    }else{
        $posts = Post::latest()->approved()->published()->paginate(6);
        foreach($posts as $item){
          $getid=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
            // array_push($item,["tag",$getid]);
                $item["categorie"]=$getid;
        }
        return view('posts',compact('last','posts'));
    }
    
    }
        
       
    public function details($slug,$plug)
    {   
       
            error_log($plug);
        
        
        $post = Post::where('slug',$plug)->approved()->published()->first();
        // error_log(gettype($post));
             
             if ($post!==Null) {
                $blogKey = 'blog_' . $post->id;
                 
             }else{
                 return view('page404');
             }
      
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
        foreach($posts as $item){
            $getid=DB::table('post_tag')->join('tags', 'tags.id','post_tag.tag_id')->select('tags.name')->where('post_id',$item->id)->first();
              // array_push($item,["tag",$getid]);
                  $item["categorie"]=$getid;
          }
        return view('category',compact('category','posts'));
    }

    public function postByTag($slug)
    {
        $tag = Tag::where('slug',$slug)->first();
        $posts = $tag->posts()->approved()->published()->get();
        return view('tag',compact('tag','posts'));
    }
    public function categorie(){
    $categories = DB::table('categories')->get();
    return view('categories', compact('categories'));
    }
}

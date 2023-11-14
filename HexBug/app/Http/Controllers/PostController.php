<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Images;
use App\Models\Tags;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\UserSubscription;


class PostController extends Controller
{
    // Show All Blogs get methods 
    public function index(){
        // if(Auth::Check()){
            $posts = Post::all();
            $user = auth()->user();
            $querytags = Tags::all();
            return view('posts.index' , ['posts'=>$posts , 'tags'=>$querytags]);
        // }
        // return redirect()->route('login'); 
    }

    public function postreadmore($id){
        $post = Post::find($id);
        $user = $post->author;
        $moreposts = $user->posts;
        return view('posts.readmore' , ['post'=>$post , 'moreposts'=>$moreposts]) ;                                                                                                                                     
    }

    public function blogposts(){
        $posts = Post::all();
        $querytags = Tags::all();
        return view('posts.blogs' , [ 'posts'=>$posts ,  'tags'=>$querytags]) ;
    }

    public function tagpost($id){
        $tag = Tags::find($id);
        $posts = $tag->posts;
        $querytags = Tags::all();
        return view('posts.blogs' , [ 'posts'=>$posts , 'tags'=>$querytags]) ; 
    }

    public function checkpostrules($id){
        $user = User::find($id);
        $userposts = $user->posts;
        if($userposts){
            $postCount = count($userposts);
        }else{
            $postCount = 0;
        }
        if($postCount>= 3){
            $subscriptions = UserSubscription::where([
                'user_id' => $user->id,
                'is_active'=> 1,
            ])->orderBy('purchase_date')->first();
            // DD($subscriptions);
            return $subscriptions;
        }
    }

    // get method to render a template
    public function createblogtemp(){
        $user = auth()->user();
        // $tte = $this->checkpostrules($user->id);
        $posts = $user->posts;
        if($posts){
            $postCount = count($posts);
        }else{
            $postCount = 0;
        }
        if($postCount>= 3){
            $currentDateTime = Carbon::now();
            $existingSubscription = UserSubscription::where([
                'user_id' => auth()->user()->id,
                'is_active' => 1,
            ])->where('purchase_date' ,'<=' , $currentDateTime->toDateTimeString())->get();
            if ($existingSubscription){
                $content = "";
                
                return view('posts.create' , ['content'=> $content]);
            }else{
              
                return redirect()->route('Subscriptionplans')->with('error','You Must Buy a Plan For More Posting');}
        }
        else{
            $content = "";
            return view('posts.create' , ['content'=>$content]);
        }
    }

   

    // Create Blog Post method 
    public function createBlog(Request $request){
        // dd("jhgjh");
        $userId = Auth::id();
        $currentDate = date('y-m-d');

        $request->validate([
            'post_title' => 'required|max:500',
            'post_content' => 'required',
            'post_desc' => 'required' , 
            'image_descriptions.*' => 'required', // validate Descriptions
            'tags.*' => 'max:100'
        ]);
        

        try{
            $post = new Post;
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_desc = $request->post_desc;
            $post->author_id = $userId;
            $post->save();
        }
        catch (Exception  $e){
            dd($e->getMessage());
            return $e;
        }
        $post_id = $post->id;

        if($request->tags){
            $tags = explode(',' , $request->tags);   //seprate tags by comma
            $tags = array_map('trim' , $tags);  // remove whitespaces
            $tags = array_unique($tags);   // remove duplicate tags 

            $tagsId = [];
            foreach($tags as $tag){
                $tag = Tags::firstOrCreate(['tag'=>$tag]);
                $tagsId[] = $tag->id;
            }
            $post->tags()->sync($tagsId);
        }

        // fxn to maintain the images that are connected with post
        if(count($request->files)>=1){
            for($i=0;$i<count($request->files);$i++){
                $newimagesfie = 'image'.$i;
                $imagePath = str_replace('public/', '', $request->file($newimagesfie)->store('public/images'));
                $desc =  $request->input("image_desc".$i);

                $image = new Images;
                $image->url = $imagePath;
                $image->desc = $desc;
                $image->post_id = $post_id;
                $image->save();
            }
        }

        return redirect()->route('index')
            ->with('success' ,'Post Created Successfully');
    }


    // update template function 
    public function updateblogtemp($id){
        $post = Post::find($id);
        return view('posts.update' , ['post'=>$post]);
    }



    // Update Blog Post method 
    public function updateBlog(Request  $request , $id){
        $userId = Auth::id();
        $currentDate = date('y-m-d');

        $request->validate([
            'post_title' => 'required|max:500',
            'post_content' => 'required',
            'post_desc' => 'required',
            
        ]);

        $post = Post::find($id);
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_desc = $request->post_desc;
        $post->author_id = $userId;
        $post->save();
        $postid = $post->id;

        if($request->tags){
            $tags = explode(',' , $request->tags);   //seprate tags by comma
            $tags = array_map('trim' , $tags);  // remove whitespaces
            $tags = array_unique($tags);   // remove duplicate tags 

            $tagsId = [];
            foreach($tags as $tag){
                $tag = Tags::firstOrCreate(['tag'=>$tag]);
                $tagsId[] = $tag->id;
            }
            $post->tags()->sync($tagsId);

        }

        // EQL QUERY 
        $findImage = Images::Where('post_id' , $postid)->get();
        // EQL QUERY
   
        for($i=1;$i<=count($findImage);$i++){
            $xx = "imageid".$i;
            $image_desc = "image_desc".$i;
            $image = "image".$i;
            
            $imageid = $request->$xx;
            $imageDesc = $request->$image_desc;
            $imageFile = $request->file($image);

            $getImage = Images::find($imageid); 

            $getImage->desc = $imageDesc;
            $imagePath = str_replace('public/', '',$imageFile->store('public/images'));
            $getImage->url = $imagePath;
            $getImage->save();                                                                                                                                                                                                                             
        }

        return redirect()->route('index')
            ->with('success' ,'Post Updated Successfully');
    }



    // Delete Blog Post Method 
    public function deleteBlog(Request $request , $id){

            // 1st Method 
        // $this->authorize('deleteBlog' , $id);

        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('index')->with('error', 'Post not found.');
        }

        // 2nd Method 
        if (Gate::denies('deleteBlog' , $post)){
            return redirect()->back()->with('error','You Are Not Authorized To delete this Post');
        };
        try {
        // Delete related images
            $images = Images::where('post_id', $post->id)->get();
            foreach ($images as $image) {
                $image->delete();
            }

        // Delete the post
            $post->delete();
                return redirect()->route('index')->with('success', 'Post deleted successfully');
            } catch (Exception $e) {
                return redirect()->route('index')->with('error', 'An error occurred while deleting the post.');
                }

    }



    public function SubScriptionPlans(){
        return view('posts.subscriptions');
    }



    public function SearchBlog(Request $request){
        $request->validate([
            'searchItem' => 'required|'
        ]);
        
        try{
        $posts = Post::where("post_title","like","%".$request->searchItem."%")
        ->orWhere("post_content","like","%".$request->searchItem."%")
        ->orWhere("post_desc" , "like" , "%".$request->searchItem."%")
        ->orWhere('author_id' , "like" , "%".$request->searchItem."%")
        ->get();
    }
    catch(Exception $e) {
        return $e;
    }

    return redirect()->route('index')->with("SearchItems", $posts);
    }

    



}

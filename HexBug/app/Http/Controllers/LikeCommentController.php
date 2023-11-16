<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comments;
use App\Models\Likes;
use App\Models\Post;
use App\Models\User;
use Exception;

class LikeCommentController extends Controller
{
    

    public function likePost($id) {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to the login page or handle unauthenticated user as needed
        }
    
        // Find the post by its ID
        $post = Post::find($id);
    
        // Check if the post exists
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found'); // Redirect back with an error message
        }
    
        // Check if the user has already liked the post
        $user = auth()->user();
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You have already liked this post');
        }
    
        // Create a new like record
        $like = new Likes();
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        $like->save();
    
        return redirect()->back()->with('success', 'Post liked successfully');
    }
    

    public function disLikePost($id){
        
        // Find the post by its ID
        $post = Post::find($id);
    
        // Check if the post exists
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found'); // Redirect back with an error message
        }

        // Check if the user has already liked the post
        $user = auth()->user();
        if ($post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->delete();
            return redirect()->back()->with('success', 'like Deleted Successfully');
        }
        else{
            return redirect()->back()->with('error', "You Doesn't like The Post Yet");
        }


    }


    public function commentPost(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|max:400',
    ]);

    $post = Post::find($id);

    if (!$post) {
        return redirect()->back()->with('error', 'No Post Found');
    }

    $user = auth()->user();

    $comment = new Comments([
        'user_id' => $user->id,
        'post_id' => $post->id,
        'comment' => $request->comment,
    ]);

    if ($request->parentComment) {
        $parentComment = Comments::find($request->parentComment);
        $comment->parent()->associate($parentComment);
    }

    $comment->save();

    return redirect()->back()->with('success', 'Commented Successfully');
}   


    public function updateComment(Request $request , $id){
        $request->validate([
            'comment' => 'required|max:400'
        ]);
        $comment = Comments::find($id);
        if(!$comment){
            return redirect()->back()->with('error' , 'Comment Not Found');
        }
        $user = auth()->user();

        $comment->comment = $request->comment;
        if($request->parentComment){
            $comment->parent_id = $request->parentComment;
        }
        $comment->save();
        return redirect()->back()->with('success' , 'Comment Updated Successfully');

    }


    public function destroyComment(Request $request , $id){
        $comment = Comments::find($id);
        if (!$comment){
            return redirect()->back()->with('error' , 'comment Not FOund');
        }
        $comment->delete();
        return redirect()->back()->with('success' , 'comment deleted');
    }


    public function Comments($id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->back()->with('error'  , 'Post Not Found');
        }
        $comments = $post->comments()->get();
        $context = [
            'comments' => $comments
        ];
        return $comments;
    }


}

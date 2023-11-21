<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discussion;
use App\Models\Category;
use App\Models\DsReply;
use App\Models\User;
use App\Models\Images;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    //

    public function DiscussionList()
    {
        $discussions = Discussion::whereNull('parent_id')->get();
        $context = [
            'discussions' => $discussions
        ];
        return view('discussion.DiscussionList', $context);
    }

    public function DiscussionCreate(Request $request)
    {


        $user = auth()->user();

        // Discussion Started -----------------------
        $discussion = new Discussion([

            'user_id' => $user->id,
        ]);
        if ($request->title) {
            $discussion->title = $request->title;
        }
        if ($request->content) {
            $discussion->content = $request->content;
        }
        if ($request->category_id) {
            $discussion->category_id = $request->category_id;
        }
        if ($request->parent_id) {
            $discussion->parent_id = $request->parent_id;
        }
        $discussion->save();


        // Discussion ENd ----------------------
        // --------- Discussion Images started ---------------
        if (count($request->files) >= 1) {
            for ($i = 0; $i < count($request->files); $i++) {
                $imgefilename = 'discussionImage' . $i;
                $imagePath = str_replace('public/', '', $request->file($imgefilename)->store('public/images/discussion'));
                $desc =  $request->input("imageDiscussion" . $i);

                // Create Images added to discusiion 
                $images = new Images([
                    'url' => $imagePath,
                    'desc' => $desc,
                ]);
                $images->discussion_id = $discussion->id;
                $images->save();
            }
        }
        return redirect()->route('DiscussionList')->with('success', 'Discussion Added Successfully');
        // ----------  Discussion Image End ----------
    }




    public function DiscussionUpdate(Request $request, $id)
    {


        $user = auth()->user();

        // Discussion Started -----------------------
        $discussion = Discussion::find($id);

        if ($request->title) {
            $discussion->title = $request->title;
        }
        if ($request->content) {
            $discussion->content = $request->content;
        }
        if ($request->category_id) {
            $discussion->category_id = $request->category_id;
        }
        if ($request->parent_id) {
            $discussion->parent_id = $request->parent_id;
        }
        $discussion->save();


        // Discussion ENd ----------------------
        // --------- Discussion Images started ---------------
        if (count($request->files) >= 1) {
            for ($i = 0; $i < count($request->files); $i++) {
                $imgefilename = 'discussionImage' . $i;
                $imagePath = str_replace('public/', '', $request->file($imgefilename)->store('public/images/discussion'));
                $desc =  $request->input("imageDiscussion" . $i);

                // Create Images added to discusiion 
                $images = new Images([
                    'url' => $imagePath,
                    'desc' => $desc,
                ]);
                $images->discussion_id = $discussion->id;
                $images->save();
            }
        }
        return redirect()->route('DiscussionList')->with('success', 'Discussion Added Successfully');
        // ----------  Discussion Image End ----------
    }


    public function SeeDiscussion($id)
    {
        $discussion = Discussion::find($id);



        // Access the child discussions

        $childDiscussions = Discussion::where('parent_id', $discussion->id)->get();

        $replies = $this->RepliesList($discussion->id);


        return view('discussion.SeeDiscussion', ['discussion' => $discussion, 'childDiscussions' => $childDiscussions, 'replies' => $replies]);
    }



    // ---------------------- Discussion Reply Answers ---------------------------------

    public function RepliesList($Dsid)
    {
        $discussion = Discussion::find($Dsid);
        $replies = DsReply::where('dicussion_id', $discussion->id);
        return $replies;
    }

    public function CreateReply(Request $request, $dsid,)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $user = auth()->user();;


        $discussion = Discussion::find($dsid);


        $reply = DsReply::create([
            'user_id' => $user->id,
            'discussion_id' => $discussion->id,
            'content' => $request->content,
        ]);
        if ($request->parent_id) {

            $parentComment = DsReply::find($request->parent_id);
            $reply->parent_id = $parentComment->id;
        }

        $reply->save();
        return redirect()->back()->with('success', 'Answer Posted');
    }
}

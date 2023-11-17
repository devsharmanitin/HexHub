<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Follower;
use App\Models\FollowRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    // sent follow request
    public function followrequestsend($id)
    {
        $receiver = User::find($id);   // the user who receives the Follow Request
        $sender  = auth()->user();   // user who send the request
        // DD($sender->id , $receiver->id);

        if (FollowRequest::where('follower_id', $receiver->id)
            ->where('following_id', $sender->id)
            ->exists()
        ) {
            return back()->with('error', 'Request Already Sent');
        } else {
            $request = new FollowRequest;
            $request->follower_id = $receiver->id;
            $request->following_id = $sender->id;
            $request->status = 'pending';
            $request->save();
            return back()->with('success', 'Request Sent');
        }
    }

    public function followrequestreceive()
    {
        $user = auth()->user();
        $pendingrequests = FollowRequest::where([
            'follower_id' => $user->id,
            'status' => 'pending'
        ])->with('user')->get();
        return $pendingrequests;
    }



    // accept follow request 
    public function acceptfollowrequest($id)
    {
        $receiver = auth()->user();
        $sender = User::find($id);
        // DD($receiver->id , $sender->id);

        $followrequest = FollowRequest::where([
            'follower_id' =>  $receiver->id,
            'following_id' => $sender->id,
            'status' => 'pending'
        ])->first();
        if ($followrequest) {
            $followrequest->status = 'accepted';
            $followrequest->save();

            $request = new Follower([
                'follower_id' => $receiver->id,
                'following_id' => $sender->id,
                'status' => 'accepted'
            ]);
            $request->save();

            return back()->with('success', "{$sender->name} is now following you");
        }

        return back()->with('error', 'Request not found or already accepted');
    }


    public function rejectfollowrequest($id)
    {
        $receiver = auth()->user();
        $sender = User::find($id);

        $followrequest = FollowRequest::where([
            'follower_id' =>  $receiver->id,
            'following_id' =>   $sender->id,
            'status' => 'pending'
        ])->first();
        if ($followrequest) {
            $followrequest->delete();
            return back()->with('success', 'Request canceled');
        }
        return back()->with('error', 'Request not found or already canceled');
    }



    public function unfollowuser($id)
    {
        $followedUser = User::find($id);
        $user = auth()->user();
        $followuser = Follower::where([
            'following_id' => $user->id,
            'follower_id' => $followedUser->id,
            'status' => 'accepted'
        ]);
        if ($followuser) {
            $followuser->delete();
            return redirect()->route('index')->with('success', 'Unfollow User Successfully');
        }
    }


    // get the list of all followers 

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->follower()->get();
        return $followers;
    }

    // get the list of all followers 
    public function following($id)
    {
        $user = User::find($id);
        $followings = $user->following()->get();
        return $followings;
    }


    public function showusers($id)
    {
        $users = User::find($id);
        $fc = new FollowController;
        $followers = $this->followers($id);
        $following = $this->following($id);
        return view('posts.userprofile', ['followers', $followers, 'followings', $following]);
    }

    public function getsingleuser($id)
    {
        if (Auth::Check()) {
            // $user = auth()->user();
            $user = User::find($id);
            $posts = Post::all();
            $followers = $this->followers($id);
            $following = $this->following($id);
            return view('profile.showuserprofile', ['user' => $user, 'followers' => $followers, 'followings' => $following, 'posts' => $posts]);
        } else {
            return redirect()->route('login');
        }
    }


    public function friendsuser()
    {
        $user = auth()->user();
        $friends = Follower::where(function ($query) use ($user) {
            $query->where('following_id', $user->id)
                ->orWhere('follower_id', $user->id)
                ->where('status', 'accepted');
        })->with('user')->get();
        return $friends;
    }


    public function friendscontact()
    {
        $user = auth()->user();
        $userid = $user->id;
        $friendsusers = User::whereNotIn('id', function ($query) use ($userid) {
            $query
                ->select('following_id')
                ->from('followers')
                ->where('follower_id', $userid);
        })->get();
        $users = $friendsusers->filter(function ($newuser) use ($user) {
            return $newuser->id != $user->id;
        });
        $friends = $this->friendsuser();
        $followrequest = $this->followrequestreceive();
        return view('profile.contact', ['friends' => $friends,  'users' => $users, 'followrequests' => $followrequest]);
    }
}

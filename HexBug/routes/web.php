<?php

use App\Http\Controllers\LikeCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\SubscriptionController;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/' , [PostController::class , 'index'])->name('index');

Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/redirect/google', 'RedirectToGoogle')->name('RedirectToGoogle');
    Route::get('auth/google/callback',  'handleGoogleCallback')->name('handleGoogleCallback');
});

Route::controller(FacebookController::class)->group(function () {
    Route::get('/auth/redirect/facebook', 'RedirectToFacebook')->name('RedirectToFacebook');
    Route::get('/auth/facebook/callback',  'handleFacebookCallback')->name('handleFacebookCallback');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index')->middleware('auth');
    Route::get('/createblogtemp', 'createblogtemp')->name('createblog')->middleware('auth');
    Route::post('/create/blog', 'createBlog')->name('createblogdb')->middleware('auth');
    Route::get('/update/post/{id}', 'updateblogtemp')->name('updateblog')->middleware('auth');
    Route::put('/post/updated/{id}', 'updateBlog')->name('updateBlogdb')->middleware('auth');
    Route::delete('/deleteBlog/{id}', 'deleteBlog')->name('deleteBlogdb')->middleware('auth');
    Route::get('/post/{id}/read', 'postreadmore')->name('postreadmore')->middleware('auth');
    Route::get('blog/post/', 'blogposts')->name('blogposts')->middleware('auth');
    Route::post('/post/{id}/blog', 'tagpost')->name('tagpost')->middleware('auth');
    Route::get('/user/plans/view', 'SubScriptionPlans')->name('subscriptionPlans');

    Route::post('query/user/post/items', 'SearchBlog')->name('SearchBlog');
    Route::get('post/{id}/share', 'PostShare')->name('PostShare');
});


Route::controller(FollowController::class)->group(function () {

    Route::post('/follow/{id}/', 'followrequestsend')->name('followrequestsend')->middleware('auth');
    Route::get('/request/follow', 'followrequestreceive')->name('followrequestreceive')->middleware('auth');
    Route::post('/request/{id}/accept', 'acceptfollowrequest')->name('acceptfollowrequest')->middleware('auth');
    Route::post('/request/{id}/reject', 'rejectfollowrequest')->name('rejectfollowrequest')->middleware('auth');
    Route::post('/{id}/followers', 'followers')->name('followers')->middleware('auth');
    Route::post('/{id}/following', 'following')->name('following')->middleware('auth');
    Route::post('/{id}/unfollow', 'unfollowuser')->name('unfollowuser')->middleware('auth');
    Route::get('/request/users/', 'showusers')->name('showusers')->middleware('auth');
    Route::get('/user/{id}/profile', 'getsingleuser')->name('getsingleuser')->middleware('auth');
    Route::get('/user/friends/', 'friendsuser')->name('friendsuser')->middleware('auth');
    Route::get('user/contact/friends', 'friendscontact')->name('friendscontact')->middleware('auth');
});




Route::controller(AuthController::class)->group(function () {

    Route::get('/add/user/{id}/details', 'addRequestUser')->name('addRequestUser');
    Route::post('/update/user/details/{id}/', 'addRequestUserdb')->name('addRequestUserdb');
    Route::get('/user/profile/request', 'RequestUser')->name('RequestUser');
    Route::get('/register', 'RegisterController')->name('register');
    Route::post('/create/user', 'CreateUser')->name('CreateUser');
    Route::get('/login', 'LoginController')->name('login');
    Route::post('/user/login', 'authenticate')->name('authenticate');
    Route::get('/logout', 'LogOutController')->name('logout')->middleware('auth');
});



Route::controller(StripeController::class)->group(function () {

    Route::get('/checkout/{id}/user', 'Checkout')->name('Checkout');
    Route::post("/checkout/{id}/session", 'StripeCheckOut')->name('StripeCheckOut');
    // Route::post('/stripe/handle/webhook', 'handlewebhook');   Webhoook Event 
    Route::get('/success/{id}/', 'success')->name('success');
});



Route::controller(SubscriptionController::class)->group(function () {

    Route::get('/create/subscription/', 'createsubscriptiontemp')->name('createsubscriptiontemp');
    Route::post('/create/user/subscription', 'createSubScription')->name('createSubScription');
    Route::get('/subscriptions/list', 'Subscriptionplans')->name('Subscriptionplans');
    Route::put('/subscription/{id}/update', 'updateSubScription')->name('updateSubScription');
    Route::delete('/subscription/{id}/delete', 'deleteSubScription')->name('deleteSubScription');
});



Route::controller(LikeCommentController::class)->group(function () {

    Route::post('/post/{id}/like/', 'likePost')->name('likePost');
    Route::post('/post/{id}/dis_like', 'disLikePost')->name('disLikePost');
    Route::post('/comment/{id}/add', 'commentPost')->name('commentPost');
    Route::put('/comment/{id}/update', 'updateComment')->name('updateComment');
    Route::delete('/destroy/{id}/Comment/', 'destroyComment')->name('destroyComment');
});

Route::controller(DiscussionController::class)->group(function () {
    Route::get('user/post/discussions/list', 'DiscussionList')->name('DiscussionList');
    Route::post('/user/post/discussion', 'DiscussionCreate')->name('DiscussionCreate');
    Route::get('dicussion/topic/{id}/more', 'SeeDiscussion')->name('SeeDiscussion');

    // ------------ reply Answers discussion -------------

    Route::post('user/{dsid}/answer/post', 'CreateReply')->name('CreateReply');
});

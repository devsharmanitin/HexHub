@extends('layouts.app')
@section('content')


<style>
  body{
    background:#eee;
}

.card{
    border:none;

    position:relative;
    overflow:hidden;
    border-radius:8px;
    cursor:pointer;
}

.card:before{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#E1BEE7;
    transform:scaleY(1);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:after{
    
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:4px;
    height:100%;
    background-color:#8E24AA;
    transform:scaleY(0);
    transition:all 0.5s;
    transform-origin: bottom
}

.card:hover::after{
    transform:scaleY(1);
}


.fonts{
    font-size:11px;
}

.social-list{
    display:flex;
    list-style:none;
    justify-content:center;
    padding:10px;
}

.social-list li{
    padding:10px;
    color:#4d4d4d;
    font-size:19px;
}


.buttons button:nth-child(1){
       border:1px solid #8E24AA !important;
       color:#8E24AA;
       height:40px;
}

.buttons button:nth-child(1):hover{
       border:1px solid #8E24AA !important;
       color:#fff;
       height:40px;
       background-color:#8E24AA;
}

.buttons button:nth-child(2){
       border:1px solid #8E24AA !important;
       background-color:#8E24AA;
       color:#fff;
        height:40px;
}
a{
  color: #8E24AA;
}
h5{
  font-size: 40px;
  font-weight: 700;
}
.text-center span{
  font-size: 20px;
  font-weight: 600;
}
.text-center p{
  font-size: 15px;
  font-weight: 700;
  color: #4d4d4d;
}
</style>

<div class="container mt-5">
    
  <div class="row d-flex justify-content-center">
      
      <div class="col-md-7">
          
          <div class="card p-3 py-4">
            <div class="backdiv">
              <nav class="d-flex mb-4">
                <h6 class="mb-0">
                  <a href="{{ route('index')}}" class="text-reset">Home</a>
                  <span>/</span>
                  <a href="" class="text-reset">Profile</a>
                  <span>/</span>
                  <a href="" class="text-reset"><u>{{$user->name}} </u></a>
                </h6>
            </nav>
            </div>
              
              <div class="text-center">
                  <img src="{{asset('storage/'.$user->image)}}" width="100" height="100" class="rounded-circle">
              </div>
              
              <div class="text-center mt-3">
                  <span class="bg-secondary p-1 px-4 rounded text-white">@ {{$user->status}}</span>
                  <h5 class="mt-2 mb-0">{{ucwords($user->name)}}</h5>
                  <span>{{$user->username}}</span>
                  
                  <div class="px-4 mt-1">
                      <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                  
                  </div>
                  <div class="p-2 text-black" style="background: transparent;">
                    <div class="d-flex justify-content-center text-center ">
                      <div class="px-3">
                        <p class="mb-1 h5">{{count($posts)}}</p>
                        <p class="small text-muted mb-0">Photos</p>
                      </div>
                      <div class="px-3">
                        <p class="mb-1 h5">{{count($followers)}}</p>
                        <p class="small text-muted mb-0">Followers</p>
                      </div>
                      <div>
                        <p class="mb-1 h5">{{count($followings)}}</p>
                        <p class="small text-muted mb-0">Following</p>
                      </div>
                    </div>
                  </div>
                  

                  <div class="buttons">
                      @if(auth()->user()->follower->contains($user->id))
                      <button class="btn btn-outline-primary px-4">Message</button>
                      <form action="{{ route('unfollowuser',['id'=>$user->id]) }}" method="post">
                        @csrf
                        @method('post')
                        <button type="submit" class="btn btn-primary px-4 ms-3">Unfollow</button>
                      </form>
                      @elseif(auth()->user()->pendingrequest->contains($user->id))
                      <button class="btn btn-primary px-4 ms-3">Pending</button>
                      @elseif(auth()->user()->following->contains($user->id))
                      <button class="btn btn-primary px-4 ms-3">Pending Request</button>
                      @else
                      <form action="{{ route('followrequestsend',['id'=>$user->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary px-4">Follow</button>
                      </form>
                      @endif
                  </div>
                  <ul class="social-list">
                    <li>
                      <a href="{{ $user->facebook }}"><ion-icon name="logo-facebook"></ion-icon></a>
                    </li>
                     <li>
                      <a href="{{$user->github}}"> <ion-icon name="logo-github"></ion-icon></a>
                     </li>
                      <li>
                        <a href="{{ $user->instagram }}"><ion-icon name="logo-instagram"></ion-icon></a>
                      </li>
                  </ul>
                  
              </div>
              
             
              
              
          </div>
          
      </div>
      
  </div>
  
</div>













@endsection
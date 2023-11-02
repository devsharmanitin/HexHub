@extends('layouts.app')
@section('content')





<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

  * {
    padding: 0;
    margin: 0;
  }

  .container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;

  }

  .container .card {
    height: 440px;
    width: 700px;
    border-radius: 10px;
    background-color: #ffffff;
    position: relative;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
    cursor: pointer;

  }

  .container .card .form {
    width: 100%;
    height: 100%;
    display: flex;

  }

  .container .card .left-side {
    width: 50%;
    background-color: #f3efef;
    height: 100%;
    border: 0.5px solid rgb(228, 226, 226);

  }

  .form .left-side .top-div {
    display: flex;
    justify-content: space-between;
    align-items: center;

    position: relative;
  }

  .form .left-side .top-div h2 {
    font-size: 30px;
    margin-bottom: 5px;
    font-weight: 8000;
  }

  .form .left-side .top-div span {
    height: 7px;
    width: 7px;
    border-radius: 50%;
    background-color: red;
    position: absolute;
    left: 67px;
    top: 46px;
  }

  .form .left-side .top-div p {
    font-size: 14px;
  }

  .form .left-side .medium-div {
    display: flex;
    justify-content: center;
    align-items: start;
    flex-direction: column;
    position: relative;
    padding: 20px 45px;
  }

  .form .left-side .Info-div {
    display: flex;
    justify-content: center;
    align-items: start;
    flex-direction: column;
    position: relative;
    width: 100%;
    
  }
  .card

  .form .left-side .medium-div h1:nth-child(1) {
    font-size: 40px;

  }

  .form .left-side .medium-div h1:nth-child(2) {
    font-weight: 100;
    font-size: 30px;
    margin-top: -20px;
    margin-bottom: 12px;
  }

  .form .left-side .medium-div p {
    font-size: 14px;
  }

  .form .left-side .icons {
    padding: 15px 45px;

    position: relative;
    display: grid;
    justify-content: center;
  }


  .form .left-side .icons button {
    height: 30px;
    width: 100px;
    justify-content: center;
    background-color: #ff4646;
    border-radius: 60px;
    border: none;
    color: white;
    transition: all 0.5s;
  }

  .form .left-side .icons button:hover {
    background-color: #f10808;
  }

  .form .left-side .last-div {
    display: flex;
    justify-content: center;
    align-items: center;

    font-size: 17px;
    font-weight: 600px;
  }

  .form .left-side .last-div p {
    padding-inline: 10px;
  }

  .hexa .hexagonal small {
    height: 10px;
    width: 10px;
    border-radius: 50%;
    border: 1px solid #ccc;
  }


  .hexa .hexagonal small:nth-child(1) {
    position: absolute;
    top: 19px;
    left: -17px;
    opacity: 0;
    transition: all 0.5s;
  }

  .hexa .hexagonal small:nth-child(2) {
    position: absolute;
    top: -12px;
    left: -35px;
    opacity: 0;
    transition: all 0.5s;
  }

  .hexa .hexagonal small:nth-child(3) {
    position: absolute;
    top: -12px;
    left: -0px;
    opacity: 0;
    transition: all 0.5s;
  }

  ion-icon {
    font-size: 30px;
    font-weight: 600;
  }







  .container .card .right-side {
    width: 50%;
    background-color: #000;
    height: 100%;
    z-index: 10;
  }

  .right-side {
    text-align: center;
    place-items: center;

  }

  .right-side img {
    display: inline-block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  @media (max-width:750px) {
    .container .card {
      max-width: 350px;

    }

    .container .card .right-side {
      display: inline-block;
    }

    .container .card .left-side {
      width: 100%;
    }
  }

  .nav {
    margin-left: auto;
  }
  .info-card{
    width: 100%;
  }
  .info-card-body{
    height: 100%;
    width: 100%;
  }
  a{
    color: #444444;
  }
</style>



<div class="container">
  
  <div class="card">
    <div class="form">

      <div class="left-side">
        <div class="top-div">
          <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                aria-controls="ex1-pills-1" aria-selected="true">
                <p>{{ explode(' ', $user->name)[0] }}</p>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab"
                aria-controls="ex1-pills-2" aria-selected="false">Info</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                aria-controls="ex1-pills-3" aria-selected="false">Social</a>
            </li>
          </ul>

        </div>

        <!-- Pills content -->
        <div class="tab-content" id="ex1-content">
          <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">

            <div class="medium-div">
              <h1>{{ explode(' ', $user->name)[0] }}</h1>
              <h1>{{ explode(' ', $user->name)[1] }}</h1>
              <p>{{$user->status}}</p>
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
            </div>
            <div class="icons">
              <button>Say Hello</button>
            </div>
            <div class="last-div">
              <p>
                <a href="{{$user->facebook}}"><ion-icon name="logo-facebook"></ion-icon></a>
              </p>

              <p>
                <a href="{{$user->instagram}}"><ion-icon name="logo-instagram"></ion-icon></a>
              </p>

              <p>
                <a href="{{$user->github}}"><ion-icon name="logo-github"></ion-icon></a>
              </p>
            </div>
          </div>

          <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">

              <div class="Info-div px-4">
                <div class="info-card mb-4">
                  <div class="info-card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="mb-0">Full Name</p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-muted mb-0">{{$user->name}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="mb-0">Email</p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-muted mb-0">{{$user->email}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="mb-0">Phone</p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-muted mb-0">{{$user->number}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="mb-0">Gender</p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-muted mb-0">{{$user->gender}}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-4">
                        <p class="mb-0">Address</p>
                      </div>
                      <div class="col-sm-8">
                        <p class="text-muted mb-0">{{$user->address}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="icons">

                <a href="{{ route('addRequestUser',['id'=>$user->id]) }}" class="btn btn-outline-primary ms-1">Update</a>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
            <div class="medium-div">
            <div class="Info-div mb-4 mb-md-0">
              <div class="info-card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">{{$user->name}}</span> Project Status
                </p>

                @foreach ($posts as $post)
                @if (isset($post))
                <p class="mb-2" style="font-size: .77rem;">{{$post->post_title}}</p>
                <div class="progress rounded mb-3" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                @else 
                <p class="mb-1" style="font-size: .77rem;">No Posts Yet.</p>
                @endif
                @endforeach
                
                
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Pills content -->


      </div>
      <div class="right-side">
        <img src="{{asset('storage/'.$user->image)}}">


      </div>
    </div>
  </div>
</div>






@endsection
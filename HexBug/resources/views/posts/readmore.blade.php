@extends('layouts.app')
@section('content')


<style>
  .home-ex {
    max-width: 800px;

  }

  .hero-section-body h1 {
    font-weight: 700;
    color: rgb(36, 36, 36);
  }

  .hero-section-body span {
    font-weight: 600;
    color: rgb(48, 47, 47);
    font-size: 1.2rem;
  }

  .btn-startd {
    background-color: rgb(24, 94, 197);
    color: white;
    font-size: 0.8rem;
    font-weight: 600;
  }

  .stat-container {
    max-height: 500px;
  }

  .blog-world-release span {
    font-size: 2rem;
    font-weight: 900 !important;
    color: black;
  }


  .author .author-content {
    color: rgb(73, 73, 73);
    justify-content: space-between;
  }

  .author .author-content,
  .author .author-content .author-profile-body {
    align-items: center;
    display: flex;
  }

  div {
    display: block;
  }

  .author .author-content .author-profile-body .author-img img {
    border-radius: 50%;
    cursor: pointer;
    height: 55px;
    width: 55px;
  }

  img,
  svg {
    vertical-align: middle;
  }

  img {
    overflow-clip-margin: content-box;
    overflow: clip;
  }

  .author .author-content .author-profile-body .author-profile span {
    font-size: 13px;
    font-weight: 900;
    color: #1e1e1f;
  }

  .px-3 {
    padding-left: 1rem !important;
    padding-right: 1rem !important;

  }

  .text-muted {
    color: #6c757d !important;
    font-size: 0.8rem;
  }

  .author .author-social-media a {

    cursor: pointer;
    font-size: 16px;
    transition: .4s ease-in-out;
  }

  a {
    color: #1e1e1f;
    padding: 0;
    margin: 0;
  }

  .all-blogs-structure .content {

    display: flex;
    justify-content: space-between;
    padding-top: 2rem;
  }

  element.style {
    font-weight: 700;
  }

  .h1,
  .h2,
  .h3,
  .h4,
  .h5,
  .h6,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    font-weight: 500;
    line-height: 1.2;
    margin-bottom: 0.5rem;
    margin-top: 0;
  }

  h5 {
    display: block;
    font-size: 1.5em;

    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: 900;
    color: rgb(44, 44, 44);

  }

  p {
    margin-bottom: 1rem;
    margin-top: 0;
  }

  element.style {
    font-weight: 400;
    font-size: 14px;
  }

  p {
    display: block;
    margin-block-start: 0.5em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
  }

  .all-blogs-structure .content .main-content img {
    width: 700px;
    height: 250px;
    object-fit: cover;
  }

  img,
  svg {
    vertical-align: middle;
  }

  .all-blogs-structure .content {

    display: flex;
    justify-content: space-between;
    padding-top: 2rem;
  }

  .m-1 {
    margin: 0.25rem !important;
  }

  .badge {
    border-radius: 0.25rem;
    color: #fff;
    display: inline-block;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    padding: 0.35em 0.65em;
    text-align: center;
    vertical-align: initial;
    white-space: nowrap;
  }

  .cookies .cookies-content p,
  .privacy .privacy-content p,
  a,
  tr {
    font-size: 14px;
  }

  .all-blogs-structure {
    max-width: 700px;
  }

  .blog-common-detail {
    align-items: center;
    display: flex;
    justify-content: space-between;
  }

  .px-2 {
    padding-left: 0.5rem !important;
    padding-right: 0.5rem !important;
  }

  .my-3 {
    margin-bottom: 1rem !important;
    margin-top: 1rem !important;
  }

  ion-icon {
    font-size: 18px;
    /* Adjust the size as needed */
    color: black;
    padding-left: 5px;
  }

  .share-option ion-icon {
    font-size: 15px;
    /* Adjust the size as needed */
    color: black;
    font-weight: 1000;

  }

  a:hover {
    color: black;
  }

  .details ion-icon {
    color: #6c757d;
  }

  .text-reset {
    font-size: 15px;
    font-weight: 600;
  }
  .Likes{
    font-size: 15px;
    font-weight: 600;
  }
  .likebtn{
    background: transparent;
    border: none;
    box-shadow: none;
  }
  form button{
    background: transparent;
    border: none;
    box-shadow: none
  }
  
  .likex-csx{
    float: right;
  }
  #replyform{
    display: none;
  }
  .card-body{
    padding: 0;
    padding-left: 20px;
  }
  
</style>


<section>
  <div class="container mt-5">

    <div class="row">
      <div class="col-9">
        <!-- heading  -->

        <!-- heading -->

        <nav class="d-flex mb-4">
          <h6 class="mb-0">
            <a href="{{ route('index')}}" class="text-reset">Home</a>
            <span>/</span>
            <a href="" class="text-reset">Blogs</a>
            <span>/</span>
            <a href="" class="text-reset"><u>Read -- {{$post->post_title}}</u></a>
          </h6>
        </nav>

        <!-- blog structure  -->

        <div class="all-blogs-structure mb-5">
          <div class="author">
            <div class="author-content">
              <div class="author-profile-body">
                <div class="author-img  px-2">
                  <img
                    src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="img-fluid" height="max-content">
                </div>

                <div class="author-profile  px-4">
                  <a href="{{ route('getsingleuser' , ['id'=>$post->author_id]) }}"> <span class="px-3">{{
                      $post->author->name }}</span></a>
                  <br>
                  <span class="px-3 text-muted">{{ $post->author->status }}</span>
                </div>
              </div>
              <div class="author-social-media">
                <a href=""><ion-icon name="logo-github"></ion-icon></a>
                <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
              </div>
            </div>
          </div>

          <div class="content mb-3">
            <div class="main-content mb-2">
              <h5 style="font-weight: 700;">{{ $post->post_title }}</h5>
              <p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">{{ $post->post_content }}</p>

              @foreach ($post->images as $image)
              <img src="{{ asset('storage/'.$image->url) }}" class="img-fluid">
              <p class="mt-2 mb-2" style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">{{ $image->desc }}
              </p>
              <div class="blog-common-detail my-3 px-2 mb-5">
                <div class="details">
                  <span class="px-1 text-muted"><ion-icon name="calendar-outline"></ion-icon>
                    &nbsp;{{$image->created_at->format('d-m-Y')}}</span>
                </div>
                <div class="share-option ">
                  <span class="px-1 text-muted"><ion-icon name="calendar-outline"></ion-icon>
                    &nbsp;{{$image->updated_at->format('d-m-Y')}}</span>
                  @if($image->updated_at->format('h') <= 12) <span class="px-1 text-muted"><ion-icon
                      name="timer-outline"></ion-icon> &nbsp;{{ $image->updated_at->format('h:i:s A') }}</span>
                    @else
                    <span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{
                      $image->updated_at->format('h:i:s A') }}</span>
                    @endif
                </div>
              </div>
              @endforeach
              <h5 style="font-weight: 700;" class="mt-5">About {{ $post->post_title }}</h5>
              <p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">{{ $post->post_desc }}</p>
            </div>
          </div>
          <span class="badge m-1"
            style="background: whitesmoke; font-weight: normal; font-size: 14px; border: 1px solid black;"><a class=""
              href="/tag/Django" style="text-decoration: none; color: black;">Django</a></span>
          <span class="badge m-1"
            style="background: whitesmoke; font-weight: normal; font-size: 14px; border: 1px solid black;"><a class=""
              href="/tag/Django" style="text-decoration: none; color: black;">Flask</a></span>

          <div class="blog-common-detail my-3 px-2">
            <div class="details">
              <span class="px-1 text-muted"><ion-icon name="calendar-outline"></ion-icon>
                &nbsp;{{$post->created_at->format('d-m-Y')}}</span>
              @if($post->created_at->format('h') <= 12) <span class="px-1 text-muted"><ion-icon
                  name="timer-outline"></ion-icon> &nbsp;{{ $post->created_at->format('h:i:s A') }}</span>
                @else
                <span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{
                  $post->created_at->format('h:i:s A') }}</span>
                @endif
            </div>
            <div class="share-option ">
              <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
              <a href=""><ion-icon name="link-outline"></ion-icon></a>
              <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
            </div>
          </div>
          <hr class="hr hr-blurry" >
          <div class="blog-social ">
            @if (session('error'))
            <div id="messageSession" class="alert alert-danger">
              {{ session('error') }}
            </div>
            @elseif(session('success'))
            <div id="messageSession" class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <div class="px-3 mb-5">
             
             
         
            
              



              <div class="small d-flex justify-content-start">
                @if($post->likes->contains('user_id', auth()->user()->id))
                  <form action="{{ route('disLikePost' , ['id'=>$post->id]) }}" class="d-flex align-items-center me-3 mx-2" method="post">
                      @csrf
                      <button type="submit"><i class="fa-solid fa-thumbs-up"></i></button>
                      <button> <p class="mb-0">Unlink</p></button>
                  </form>
                @else
                  <form action="{{ route('likePost' , ['id'=>$post->id]) }}" method="post" class="d-flex align-items-center me-3 mx-2">
                      @csrf
                      <button type="submit"><i class="fa-regular fa-thumbs-up"></i></button>                                                                                        
                      <button> <p class="mb-0">Like</p></button>
                  </form>
                @endif  
                
                
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="far fa-comment-dots me-2"></i>
                  <p class="mb-0">Comment</p>
                 
                </a>
               
                <a href="#!" class="d-flex align-items-center me-3">
                  <i class="fas fa-share me-2"></i>
                  <p class="mb-0">Share</p>
                </a>

                <div class="likex-csx">
                  <p class="small text-muted mb-0"><span class="Likes">{{ count($post->likes) }} Like</span></p>
                </div>
                
              </div>
              
            </div>
          </div>
         
        </div>
        <!-- end blog structure  -->
        <hr class="hr hr-blurry" />

        <!-- comments  -->
       
       



        
            <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                  <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    
                    <div class="d-flex flex-start w-100 mb-4">
                      <img class="rounded-circle shadow-1-strong me-3"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                        height="40" />
                        <div>
                          <h6 class="fw-bold text-primary mb-1">{{ $post->author->name }}</h6>
                          <p class="text-muted small mb-0">
                            Comment
                          </p>
                        </div>
                        
                    </div>
                    <form action="{{ route('commentPost',['id'=>$post->id]) }}" method="post">
                    <div class="d-flex flex-start w-100">
                        @csrf
                      <div class="msgx w-75">
                        <div class="form-outline">
                          <textarea class="form-control" name="comment" id="textAreaExample" rows="1"
                          style="background: #fff;"></textarea>
                          <label class="form-label" for="textAreaExample">Message</label>
                        </div>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-link btn-link-success"><ion-icon name="send"></ion-icon></button>
                      </div>
                    </div>                   
                  </form>
                  </div>
                  <!-- Comments Section  -->
                
                  @foreach($post->comments as $comment)
                 
                  <div class="card-body">
                    <div class="d-flex flex-start align-items-center">
                      @if($comment->user->image)
                      <img class="rounded-circle shadow-1-strong me-3"
                        src="{{ asset('storage/'. $comment->user->image) }}" alt="avatar" width="40"
                        height="40" style="object-fit: cover;" />
                        @else
                        <img class="rounded-circle shadow-1-strong me-3"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                        height="40" />
                        @endif
                      <div>
                        <h6 class="fw-bold text-primary mb-1">{{ $comment->user->name }}</h6>
                        <p class="text-muted small mb-0">
                          {{ $comment->comment }} !
                        </p>
                        @if($comment->replies)
                        <div class="replycomments">
                          <p>{{$comment->comment}}</p>
                        </div>
                        @endif
                      </div>
                     
                    </div>
        
                   
                    <div class="small d-flex justify-content-start">
                     
                      <a href="#!" class="d-flex align-items-center me-3">
                        <form action="{{ route('commentPost' , ['id'=>$post->id]) }}" method="post" id="replyform">
                          @csrf
                          <input type="hidden" name="parentComment" value="{{$comment->id}}">
                          <input type="text" name="comment" id="" class="form-control">
                          <button type="submit">Reply</button>
                        </form>
                        <i class="far fa-comment-dots me-2" ></i>
                        <p class="mb-0" id="replycomment">Reply</p>
                      </a>
                     
                    </div>
                  </div>
                  <hr>
                  @endforeach
                  
                </div>
              </div>
            </div>
        

        <!-- comments  -->


      </div>
      <div class="col-3">
        <div class="row blog-world-release mb-4">
          <span class="bold" style="font-size: 20px;">More From {{$post->author->name}} </span>
        </div>

        <div class="accordion accordion-borderless" id="accordionFlushExampleX">
          @foreach ($moreposts as $authorpost)
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOneX">
              <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOneX" aria-expanded="false" aria-controls="flush-collapseOneX">
                {{ $authorpost->post_title}}
              </button>
            </h2>
            <div id="flush-collapseOneX" class="accordion-collapse collapse" aria-labelledby="flush-headingOneX"
              data-mdb-parent="#accordionFlushExampleX">
              <div class="accordion-body">
                <code>{{ $authorpost->post_content }}</code>
              </div>
            </div>
          </div>
          @endforeach


        </div>

      </div>

    </div>
  </div>
</section>

<script>
  document.getElementById("replycomment").addEventListener('click' , ()=>{
    document.getElementById("replyform").style.display = 'block';
    document.getElementById("replycomment").style.display = 'none';
  })
</script>

@endsection
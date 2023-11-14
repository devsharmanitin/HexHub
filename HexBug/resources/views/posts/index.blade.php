@extends('layouts.app')
@section('content')




<style>
  .nav-bar {
    background-color: transparent;
    color: rgb(34, 34, 34);
    width: 85%;
    }
    .py-5 {
    padding-bottom: 3rem!important;
    padding-top: 3rem!important;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1140px;
   
}
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
}
.nav-bar .nav-body, .nav-bar .nav-right {
    align-items: center;
    display: flex;
    justify-content: space-between;

}

.nav-bar .nav-body .nav-menu a {
    font-size: 16px;
    font-weight: 700;
    padding: 0 1rem;
}
.nav-bar .nav-body .nav-menu a, .nav-bar .nav-logo a {
    color: rgb(34, 34, 34);
    text-decoration: none;
    transition: .4s ease-in-out;
}
.home-ex{
  max-width: 800px;

}
.hero-section-body h1{
  font-weight: 700;
  color: rgb(36, 36, 36);
}
.hero-section-body span{
  font-weight: 600;
  color: rgb(48, 47, 47);
  font-size: 1.2rem;
}
.btn-startd{
  background-color: rgb(24, 94, 197);
  color: white;
  font-size: 0.8rem;
  font-weight: 600;
}
.stat-container{
  max-height: 500px;
}
.blog-world-release span{
  font-size: 2rem;
  font-weight: 900!important;
  color: black;
}


.author .author-content {
    color: rgb(209, 65, 202);
    justify-content: space-between;
}
.author .author-content, .author .author-content .author-profile-body {
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
img, svg {
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
    padding-left: 1rem!important;
    padding-right: 1rem!important;
    
}
.text-muted {
    color: #6c757d!important;
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
.all-blogs-structure .content img {
    margin-left: 5rem;
    width: 150px;
    height: 150px;
    object-fit: cover;
}

.all-blogs-structure .content {
    display: flex;
    justify-content: space-between;
    padding-top: 2rem;
}
.m-1 {
    margin: 0.25rem!important;
}


.all-blogs-structure{
  max-width: 700px;
}
.blog-common-detail {
    align-items: center;
    display: flex;
    justify-content: space-between;
}
.px-2 {
    padding-left: 0.5rem!important;
    padding-right: 0.5rem!important;
}
.my-3 {
    margin-bottom: 1rem!important;
    margin-top: 1rem!important;
}

ion-icon {
    font-size: 18px; /* Adjust the size as needed */
    color: black;
    padding-left: 5px;
}
.share-option ion-icon {
    font-size: 20px; /* Adjust the size as needed */
    color: black;
    font-weight: 1000;
    
}
a:hover{
  color: black;
}
.details ion-icon{
  color: #6c757d;
}
.nav_img{
  height: 30px;
  width: 30px;
  border-radius: 50%;
  object-fit: cover;
}
.list{
  width: 70%;
}
.itemcount{
  width: 30%;
}
.listitem{
  margin: 0;
}
.varcount{
  height: 30px;
  width: 30px;
  border-radius: 50%;
  object-fit: cover;
  background-color: rgb(24, 94, 197);
  text-align: center;
  color: white;
}
.tagbtn{
  background: transparent;
  border: none;
  height: none;
  width: none;
  text-align: center;
}


</style>


<div class="container-fluid">
	<div class="row">



  @include('layouts.navbar')
	</div>	
</div>


<div class="container stat-container">
  <div class="py-5 container">
    <section class=" home-ex">
      <div class="hero-section-body pb-5">
        <h1 class="pb-2 display-5">Find Blogs on Python, Django, Restful API, Web Development & More 👋</h1>
        <span>
          Find out some quallity blogs on python, Django , Django rest framework and other web devlopment topics
        </span>
        <div class="mt-5"><a class="btn btn-startd border px-5 py-3 border-0" href="/blogs">Get Started <i class="fa-solid fa-chevron-right"></i></a></div>
      </div>
    </section>
  </div>
</div>

<section>
  <div class="container">

    <div class="row">
      <div class="col-8">


      <!-- Searched Items  -->

      @if (session('SearchItems'))
      <div class="row blog-world-release mb-4">
          <span class="bold"style="color: skyblue;" >Results</span>
        </div>

			@foreach (session('SearchItems') as $post)
			<div class="all-blogs-structure mb-5">
			<div class="author">
				<div class="author-content">
				<div class="author-profile-body">
					<div class="author-img  px-2">
					<img src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
					</div>
					
					<div class="author-profile  px-4">
					<a href="{{ route('getsingleuser' , ['id'=>$post->author_id]) }}"> <span class="px-3">{{ $post->author->name }}</span></a>
					<br>
					<span class="px-3 text-muted">{{ $post->author->status }}</span>
					</div>
				</div>
				<div class="author-social-media">
					<a href="{{ $post->author->github }}"><ion-icon name="logo-github"></ion-icon></a>
					<a href="{{ $post->author->facebook }}"><ion-icon name="logo-facebook"></ion-icon></a>
					<a href="{{ $post->author->instagram }}"><ion-icon name="logo-instagram"></ion-icon></a>
				</div>
				</div>
			</div>
			<a href="{{ route('postreadmore' , ['id'=>$post->id]) }}">
				<div class="content">
				<div class="main-content">
					<h5 style="font-weight: 700;">{{ $post->post_title }}</h5>
					<p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">{{ implode(' ', array_slice(str_word_count($post->post_desc, 1), 0, 100)) }}</p>
				</div>
				<div class="img">
					<img src="{{ asset('storage/'.$post->images[0]->url) }}">
				</div>
				</div>
				@foreach ($post->tags as $tag)
				<span class="badge m-1" style="background: whitesmoke;  font-size: 14px; font-weight: 700; color: #6c757d;  border: 1.5px solid rgb(56, 56, 56);"><a class="" href="/tag/Django" style="text-decoration: none; color: black;">{{$tag->tag}}</a></span>
				@endforeach
				
			</a>
			<div class="blog-common-detail my-3 px-2">
				<div class="details">
				<span class="px-1 text-muted"><ion-icon name="calendar-outline"></ion-icon> &nbsp;{{$post->created_at->format('d-m-Y')}}</span>
				@if($post->created_at->format('h') <= 12)
					<span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{ $post->created_at->format('h:i:s A') }}</span>
				@else
					<span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{ $post->created_at->format('h:i:s A') }}</span>
				@endif

				</div>
				<div class="share-option ">
				<a href=""><ion-icon name="logo-facebook"></ion-icon></a>
				<a href=""><ion-icon name="link-outline"></ion-icon></a>
				<a href=""><ion-icon name="logo-instagram"></ion-icon></a>
				</div>
			</div>
			</div>
			<hr class="hr hr-blurry" />
			<hr class="hr hr-blurry" />


			@endforeach
		@endif

      <!-- End searchd Items  -->

      @if (session('error'))
			<div id="messageSession" class="alert alert-danger">
				{{ session('error') }}
			</div>
			@elseif(session('success'))
			<div id="messageSession" class="alert alert-success">
				{{ session('success') }}
			</div>
			@endif
        <!-- heading  -->
        <div class="row blog-world-release mb-4">
          <span class="bold">Recently Released</span>
        </div>
        <!-- heading --> 
        <!-- blog structure  -->
        @if($posts)
        @foreach ($posts as $post)
        <div class="all-blogs-structure mb-5">
          <div class="author">
            <div class="author-content">
              <div class="author-profile-body">
                <div class="author-img  px-2">
                  <img src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                
                <div class="author-profile  px-4">
                  <a href="{{ route('getsingleuser' , ['id'=>$post->author_id]) }}"> <span class="px-3">{{ $post->author->name }}</span></a>
                  <br>
                  <span class="px-3 text-muted">{{ $post->author->status }}</span>
                </div>
              </div>
              <div class="author-social-media">
                <a href="{{ $post->author->github }}"><ion-icon name="logo-github"></ion-icon></a>
                <a href="{{ $post->author->facebook }}"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="{{ $post->author->instagram }}"><ion-icon name="logo-instagram"></ion-icon></a>
              </div>
            </div>
          </div>
          <a href="{{ route('postreadmore' , ['id'=>$post->id]) }}">
            <div class="content">
              <div class="main-content">
                <h5 style="font-weight: 700;">{{ $post->post_title }}</h5>
                <p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">{{ implode(' ', array_slice(str_word_count($post->post_desc, 1), 0, 100)) }}</p>
              </div>
              <div class="img">
                <img src="{{ asset('storage/'.$post->images[0]->url) }}">
              </div>
            </div>
            @foreach ($post->tags as $tag)
            <span class="badge m-1" style="background: whitesmoke;  font-size: 14px; font-weight: 700; color: #6c757d;  border: 1.5px solid rgb(56, 56, 56);"><a class="" href="/tag/Django" style="text-decoration: none; color: black;">{{$tag->tag}}</a></span>
            @endforeach
            
          </a>
          <div class="blog-common-detail my-3 px-2">
            <div class="details">
              <span class="px-1 text-muted"><ion-icon name="calendar-outline"></ion-icon> &nbsp;{{$post->created_at->format('d-m-Y')}}</span>
              @if($post->created_at->format('h') <= 12)
                  <span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{ $post->created_at->format('h:i:s A') }}</span>
              @else
                  <span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp;{{ $post->created_at->format('h:i:s A') }}</span>
              @endif

            </div>
            <div class="share-option ">
              <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
              <a href=""><ion-icon name="link-outline"></ion-icon></a>
              <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
            </div>
          </div>
        </div>
        <hr class="hr hr-blurry" />
        @endforeach
        @endif
        <!-- end blog structure  -->

      </div>
      <div class="col-4">
        <div class="row blog-world-release mb-4">
          <span class="bold">Read More On </span>
        </div>

        @if($tags)
        @foreach($tags as $tag)
        <div class="listgroup d-flex">
          <div class="list">
            <form action="{{ route('tagpost' , ['id'=>$tag->id]) }}" method="post">
              @method('post')
              @csrf
              <button type="submit" class="tagbtn">
              <p  class="bold px-2" style="font-size: 16px; font-weight: 700; color: black;">{{ucwords($tag->tag)}}</p>
            </button>
          </form>
          </div>
          <div class="itemcount">
            <div class="varcount">
              <p>{{count($tag->posts)}}</p>
            </div>
          </div>
        </div>
        <hr class="listitem">
        @endforeach
        @endif

       

        <!-- <div class="accordion accordion-borderless" id="accordionFlushExampleX">
          @foreach($tags as $tag)
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOneX">
              <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOneX" aria-expanded="false" aria-controls="flush-collapseOneX">
                <p style="font-weight: 700;">{{$tag->tag}}</p> &nbsp;&nbsp;
                <p style="font-weight: 700; font-size: 20px;">{{count($tag->posts)}}</p>
              </button>
            </h2>
            <div id="flush-collapseOneX" class="accordion-collapse collapse"
              aria-labelledby="flush-headingOneX" data-mdb-parent="#accordionFlushExampleX">
              <div class="accordion-body">
                Placeholder content for this accordion, which is intended to demonstrate the
                <code>.accordion-flush</code> class. This is the first item's accordion body.
              </div>
            </div>
          </div>
          @endforeach
        </div> -->

      </div>
      
    </div>
  </div>
</section>





@endsection
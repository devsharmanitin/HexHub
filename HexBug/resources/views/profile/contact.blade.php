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
    font-size: 12px;
    font-weight: 700;
}


.all-blogs-structure .content {
    display: flex;
    justify-content: space-between;
    padding-top: 2rem;
    height: 480px;
}
.m-1 {
    margin: 0.25rem!important;
}


.all-blogs-structure{
  padding-left: 20px;
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
.share-option {
    
	width: 15%;
    
}
a:hover{
  color: black;
}
.details{
  color: #6c757d;
  width: 85%;
}


.addbtn{
  border: none;
  background: transparent;
  box-shadow: none;
}
.addbtn:hover{
  box-shadow: none;
}
</style>





<section class="vh-100">
  <div class="container-fluid">

    <div class="row">
      <div class="col-9">
        <!-- blog structure  -->
      
        
        <div class="all-blogs-structure mb-5">
          <div class="author">
            <div class="author-content">
              <div class="author-profile-body">
                <div class="author-img  px-2">
                  <img src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                
                <div class="author-profile  px-4">
                  <a href=""> <span class="px-3">rohit</span></a>
                  <br>
                  <span class="px-3 text-muted">blogger</span>
                </div>
              </div>
              <div class="author-social-media px-5">
                <a href=""><ion-icon name="close-outline"></ion-icon></ion-icon></a>
                
              </div>
            </div>
          </div>
          <a href="">
            <div class="content ">
              <div class="main-content " >


                <!-- Message Here  -->
                <h5 style="font-weight: 700;">one piece</h5>
                <p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);">luffy</p>


              </div>
            </div>
          </a>
          <div class="blog-common-detail my-3 px-2">
            <div class="details">
              
			<input type="hidden" value="" id="receiverId">
           <input type="text" class="form-control" name="messages" id="sendMessage" placeholder="message here..">

            </div>
            <div class="share-option text-center">
              <button class="btn" id="sendMessageBtn">Send</button>
            </div>
          </div>
        </div>
        <hr class="hr hr-blurry" />
      
        <!-- end blog structure  -->

      </div>
      <div class="col-3">
                <!-- Tabs navs -->
          <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1" role="tab"
                aria-controls="ex-with-icons-tabs-1" aria-selected="true"><ion-icon name="people-circle-outline"></ion-icon></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
                aria-controls="ex-with-icons-tabs-2" aria-selected="false"><ion-icon name="checkmark-done-outline"></ion-icon></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="ex-with-icons-tab-3" data-mdb-toggle="tab" href="#ex-with-icons-tabs-3" role="tab"
                aria-controls="ex-with-icons-tabs-3" aria-selected="false"><ion-icon name="person-add-outline"></ion-icon></a>
            </li>
            
          </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
          <div class="tab-content" id="ex-with-icons-content">
            <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
              <table class="table align-middle mb-0 bg-white px-2">
                <p class="text-muted">Friends </p>
                <tbody>
                  @foreach($friends as $friend)
                  <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      @if($friend->user->image)
                    <img
                      src="{{ asset('storage/'.$friend->user->image) }}"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @else
                      <img
                      src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @endif
                    <div class="ms-3">
                      <a href="{{ route('getsingleuser',['id'=>$friend->user->id]) }}" ><p class="fw-bold ">{{$friend->user->name}}</p></a>
                      <p class="text-muted mb-0">{{$friend->user->email}}</p>
                    </div>
                    </div>
                  </td>
                  
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
              <table class="table align-middle mb-0 bg-white px-2">
                <p class="text-muted">Requests </p>
                <tbody>
                  @foreach($followrequests as $requesteduser)
                
                  <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      @if($requesteduser->image)
                      <img
                      src="{{ asset('storage/'.$requesteduser->user->image) }}"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @else
                      <img
                      src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @endif
                      <div class="ms-3">
                        <a href="{{ route('getsingleuser',['id'=>$requesteduser->user->id]) }}" ><p class="fw-bold">{{$requesteduser->user->name}}</p></a>
                        <p class="text-muted mb-0">{{$requesteduser->user->email}}</p>
                      </div>
                      <form action="{{ route('rejectfollowrequest' , ['id'=>$requesteduser->user->id]) }}" method="post">
                        <button type="submit" class="addbtn px-2">
                        @csrf
                        @method('post')
                        <ion-icon name="close-outline"></ion-icon>
                        </button>
                      </form>
                      <form action="{{ route('acceptfollowrequest' , ['id'=>$requesteduser->user->id]) }}" method="post">
                      <button type="submit" class="addbtn ">
                      @csrf
                      @method('post')
                      <ion-icon name="checkmark-outline"></ion-icon>
                      </button>
                    </form>
                    
                    </div>
                  </td>
                  
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
              <table class="table align-middle mb-0 bg-white px-2">
                <p class="text-muted">Add Friend </p>
                <tbody>
                  @foreach($users as $adduser)
                  <tr>
                  <td>
                    <form action="{{ route('followrequestsend' , ['id'=>$adduser->id]) }}" method="post">
                    <div class="d-flex align-items-center">
                      @if($adduser->image)
                    <img
                      src="{{ asset('storage/'.$adduser->image) }}"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @else
                      <img
                      src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
                      alt=""
                      style="width: 45px; height: 45px"
                      class="rounded-circle"
                      />
                      @endif
                    <div class="ms-3">
                      <a href="{{ route('getsingleuser',['id'=>$adduser->id]) }}" ><p class="fw-bold">{{$adduser->name}}</p></a>
                      <p class="text-muted mb-0">{{$adduser->email}}</p>
                    </div>
                      <button type="submit" class="addbtn px-3">
                      @csrf
                      @method('post')
                      <ion-icon name="add-outline"></ion-icon>
                      </button>
                    </div>
                  </form>
                  </td>
                  
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        <!-- Tabs content -->
      </div>
      
    </div>
  </div>
</section>



<script>

	let sendMessageBtn = document.getElementById("sendMessageBtn");
	sendMessageBtn.addEventListener('click' , ()=>{
		let sendMessage = document.getElementById("sendMessage");
		let receiverId = document.getElementById("receiverId");
		Message = sendMessage.value;

		fetch("/user/sendMessage/" ,{
			method : "POST",
			headers: {
				'Content-Type' : "application/json",
				'X-CSRF-TOKEN' : csrfToken,

			},
			body: JSON.stringify({
				'message' : Message , 
				'receiverId' : receiverId,
			})
		})
			.then(response => response.json())
		  	.then(data => {
				// Handle the response from the server (e.g., show success message)
				console.log(data);
    		});

	})

</script>



@endsection











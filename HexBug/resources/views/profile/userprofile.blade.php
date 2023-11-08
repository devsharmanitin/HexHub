@extends('layouts.app')
@section('content')

<style>
  .medium-div p {
    font-size: 14px;
    font-weight: 600;
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
  }
  .container-fluid{
    margin: 0;
   
  }

  h1 {
    font-size: 30px;
    margin-bottom: 5px;
    font-weight: 900;
  }

  .px-3 {
    padding-left: 0 !important;
  }
  p a ion-icon{
    font-size: 30px;
    font-weight: 800;
    color: rgb(61, 61, 61);
  }
  .nav-pills{
    font-weight: 600;
    font-size: 20px;
    color: black;
  }
  p span{
    font-weight: 600;
    color: rgb(26, 25, 25);
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-6">
      <img src="{{asset('storage/'.$user->image)}}" style="width: 100%; height: 100vh; object-fit: cover;">
    </div>
    <div class="col-6">
      <div class="container">
        <!-- Tabs navs -->
        <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1"
              role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i
                class="fas fa-chart-pie fa-fw me-2"></i>My Profile</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
              aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i
                class="fas fa-chart-line fa-fw me-2"></i>Projects</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex-with-icons-tab-3" data-mdb-toggle="tab" href="#ex-with-icons-tabs-3" role="tab"
              aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i
                class="fas fa-cogs fa-fw me-2"></i>SubScriptions</a>
          </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex-with-icons-content">
          <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel"
            aria-labelledby="ex-with-icons-tab-1">

            <div class="container">
              <div class="row">
                <div class="col-10">
                  <div class="medium-div py-2">
                    <h1>{{ explode(' ', $user->name)[0] }}</h1>
                    <h1>{{ explode(' ', $user->name)[1] }}</h1>
                    <p>{{$user->email}}</p>
                    <p>{{$user->username}}</p>
                    <p>@ {{$user->status}}</p>
                    <p>(+ 91) {{$user->number}}</p>
                    <p>{{$user->address}}</p>
                    <div class="mt-5 mb-5 text-black" style="background: transparent;">
                      <div class="d-flex justify-content-start  ">
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
                  <div class="px-3 mb-5">
                    <p class="mb-1 h5"><span>₹ {{ $spentamount }}</span></p>
                    <p class="small text-muted mb-0"><span>Total Amount Spent</span></p>
                  </div>
                  <a href="{{ route('addRequestUser',['id'=>$user->id]) }}" class="btn btn-outline-primary ms-1">Update Profile</a>
                </div>
                <div class="col-2">
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
            </div>


          </div>
          <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

            <p class="mb-4"><span class="text-primary font-italic me-1">
            </p>

            <table class="table align-middle mb-0 bg-white">
              <thead class="bg-light">
                <tr>
                  <th>
                    <p class="fw-bold mb-1">Projects
                  </th>
                  </p>
                  <th>Title</th>

                  <th>Position</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                @if (isset($post))
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ asset('storage/'.$post->images[0]->url) }}" alt=""
                        style="width: 45px; height: 45px; object-fit: cover;" class="rounded-circle" />
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{$post->post_title}}</p>
                        <div class="progress rounded mb-3" style="height: 5px;">
                          <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td>
                    <span class="badge badge-success rounded-pill d-inline">Active</span>
                  </td>
                  <td>
                    <a href="{{ route('updateblog' , ['id'=>$post->id]) }}" class="btn btn-link btn-sm btn-rounded">
                      Edit
                    </a>
                  </td>
                  <td>
                    <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div
                    class="modal fade"
                    id="staticBackdrop"
                    data-mdb-backdrop="static"
                    data-mdb-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Delete Post</h5>
                          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Do You Really Want to Delete this Post. All the Images Related to This Post Will Be Deleted !</div>
                        <div class="modal-footer">
                          <form action="{{ route('deleteBlogdb' , ['id=$post->id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Understood</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>
                </tr>
                @else
                <tr>
                  <td>No Posts Yet</td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>


          </div>
          <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
            <!--Main layout-->
            <main class="my-4">
            

                <!--Section: Content-->
                <section class="text-center">
                  <h4 class="mb-4"><strong>Purchase Plan</strong></h4>


                  <div class="row gx-lg-5 justify-content-center">
                    <!--Grid column-->
                    @foreach($plans as $plan )
                     <div class="col-lg-6 col-md-6 mb-4">
                      @if (session('error'))
                      <div id="messageSession" class="alert alert-danger">
                        {{ session('error') }}
                      </div>
                      @elseif(session('success'))
                      <div id="messageSession" class="alert alert-success">
                        {{ session('success') }}
                      </div>
                      @endif

                      <!-- Card -->
                      <div class="card" style="border: 0.5px solid rgb(179, 178, 178);">

                        <div class="card-header bg-white py-3">
                          <p class="text-uppercase small mb-2"><strong>{{$plan->subscriptions->name}}</strong></p>
                          <h5 class="mb-0">₹ {{$plan->subscriptions->price}}</h5>
                          <p>{{$plan->purchase_date}}</p>
                        </div>
                        @php
                        $contents = explode("," , $plan->subscriptions->content)
                        @endphp
                        <div class="card-body">
                          <ul class="list-group list-group-flush">
                            @foreach($contents as $content)
                            <li class="list-group-item text-muted" style="font-weight: 600;">{{$content}}</li>
                            @endforeach

                          </ul>
                        </div> 
                      <!-- Card -->

                    </div>
                    @endforeach
                    <!--Grid column-->



                  </div>
                </section>
                <!--Section: Content-->
            
            </main>
            <!--Main layout-->


            <script>
              setTimeout(function () {
                var messageSession = document.getElementById('messageSession');
                if (messageSession) {
                  messageSession.style.display = 'none'; // Clear the message container
                }
              }, 3000); // 5000 milliseconds = 5 seconds
            </script>
          </div>
        </div>
        <!-- Tabs content -->
      </div>
    </div>
  </div>
</div>





@endsection
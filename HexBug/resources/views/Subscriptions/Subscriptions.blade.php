@extends('layouts.app')
@section('content')

@include('layouts.navbar')

<style>
	
</style>

  <!--Main layout-->
  <main class="my-4">
    <div class="container">

      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-4"><strong>Pricing</strong></h4>
       

        <div class="row gx-lg-5 justify-content-center">

          <!--Grid column-->
		  @foreach($plans as $plan )


          <div  class="col-lg-3 col-md-6 mb-4">
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
                <p class="text-uppercase small mb-2"><strong>{{$plan->name}}</strong></p>
                <h5 class="mb-0">₹ {{$plan->price}}</h5>
              </div>
			  @php  
			  $contents = explode("," , $plan->content)
			  @endphp
              <div class="card-body">
                <ul class="list-group list-group-flush">
					@foreach($contents as $content)
                  <li class="list-group-item text-muted" style="font-weight: 600;">{{$content}}</li>
				  @endforeach
                  
                </ul>
              </div>

              <div class="card-footer bg-white py-2">
				<a href="{{ route('Checkout' , ['id'=>$plan->id]) }}" class="btn btn-info btn-sm">Buy now</a>
              </div>

            </div>
            <!-- Card -->
			
		</div>
		@endforeach
          <!--Grid column-->

          

        </div>
      </section>
      <!--Section: Content-->
    </div>
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



@endsection


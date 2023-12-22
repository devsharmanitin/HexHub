@extends('layouts.app')
@section('content')


<style>
	#imageroe {
		display: none;
	}

	* {
		font-weight: 700;
	}
</style>

<!--Main Navigation-->
<header>
	<!-- Intro settings -->
	<style>
		#intro {
			/* Margin to fix overlapping fixed navbar */
			margin-top: 58px;
		}

		@media (max-width: 991px) {
			#intro {
				/* Margin to fix overlapping fixed navbar */
				margin-top: 45px;
			}
		}
	</style>

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="my-5">
	<div class="container">


		<!--Section: Content-->
		<section>
			<div class="row gx-lg-5">
				<div class="col-lg-2 col-md-12 mb-4 mb-lg-0">

				</div>

				<div class="col-lg-8 col-md-6 mb-4 mb-lg-0">
					<!-- News block -->
					<div>


						<!-- Article data -->
						<div class="row mb-3">
							<div class="col-6">
								<a href="" class="text-danger">
									<i class="fas fa-chart-pie"></i>
									Discussion's
								</a>
							</div>

							<div class="col-6 text-end">
								<u> <!-- Button trigger modal -->
									<button type="button" class="btn btn-link-secondary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="box-shadow: none; font-weight: 700;">
										<i class="fa-solid fa-plus me-2" style="color: #868788;"></i> Add Discussion
									</button></u>
							</div>
						</div>

						<!-- Article title and description -->
						<a href="" class="text-dark">
							<h5>Topic-Specific Discussion Section</h5>

							<p>
								Join the conversation! Share your thoughts, ideas, and experiences in our vibrant discussion community. Your voice matters, and we're eager to hear what you have to say
							</p>
						</a>
						<hr>


						@if(count($pinnedDiss)>=1)
						@foreach($pinnedDiss as $Pdiscussion)


						<a href="{{ route('SeeDiscussion', ['id' => $discussion->id]) }}" class="text-dark">
							<div class="row mb-4 border-bottom pb-2">
								<div class="col-3">
									@if(count($Pdiscussion->images)>=1)
									<img src="{{asset('storage/'.$Pdiscussion->images[0]->url)}}" class="img-fluid shadow-1-strong rounded" alt="" />
									@else
									<img src="https://www.positronx.io/wp-content/uploads/2021/06/14952-2.jpghttps://www.positronx.io/wp-content/uploads/2021/06/14952-2.jpg" class="img-fluid shadow-1-strong rounded" alt="" />
									@endif
								</div>

								<div class="col-9">
									<div class="row">
										<div class="col-8">
											<p class="mb-2"><strong>{{$Pdiscussion->title}}</strong></p>
											<p>
												<u> 15.07.2020</u>
											</p>
											<div class="d-flex">
												<img src="{{ asset('storage/'.$Pdiscussion->user->image) }}" alt="" style="height: 25px; width: 25px; border-radius: 50%; object-fit: cover;">
												&nbsp;&nbsp;
												<p style="font-size: 14px; font-weight: 600;">{{$Pdiscussion->user->name}}</p>
											</div>
										</div>
										<div class="col-4">
											<p class="mb-2"><strong>Replies</strong></p>
											<p>
												<u> 20</u>
											</p>
										</div>
									</div>

								</div>
							</div>
						</a>
						@endforeach


						@endif

						<hr />

						<!-- News -->
						@if(count($discussions)>=1)
						@foreach($discussions as $discussion)


						<a href="{{ route('SeeDiscussion', ['id' => $discussion->id]) }}" class="text-dark">
							<div class="row mb-4 border-bottom pb-2">
								<div class="col-3">
									@if(count($discussion->images)>=1)
									<img src="{{asset('storage/'.$discussion->images[0]->url)}}" class="img-fluid shadow-1-strong rounded" alt="" />
									@else
									<img src="https://www.positronx.io/wp-content/uploads/2021/06/14952-2.jpghttps://www.positronx.io/wp-content/uploads/2021/06/14952-2.jpg" class="img-fluid shadow-1-strong rounded" alt="" />
									@endif
								</div>

								<div class="col-9">
									<div class="row">
										<div class="col-8">
											<p class="mb-2"><strong>{{$discussion->title}}</strong></p>
											<p>
												<u> 15.07.2020</u>
											</p>
											<div class="d-flex">
												<img src="{{ asset('storage/'.$discussion->user->image) }}" alt="" style="height: 25px; width: 25px; border-radius: 50%; object-fit: cover;">
												&nbsp;&nbsp;
												<p style="font-size: 14px; font-weight: 600;">{{$discussion->user->name}}</p>
											</div>
										</div>
										<div class="col-4">
											<p class="mb-2"><strong>Replies</strong></p>
											<p>
												<u> 20</u>
											</p>
										</div>
									</div>

								</div>
							</div>
						</a>
						@endforeach
						@else

						<p><span style="font-size: 24px; font-weight: 900; color:#868788; ">No Discussion Yet !! </span></p>
						<button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal" style="box-shadow: none; font-size: 14px; font-weight: 700;">
							<i class="fa-solid fa-plus me-2" style="color: white;"></i> Start Discussion
						</button>


						@endif


					</div>
					<!-- News block -->
				</div>

				<div class="col-lg-2 col-md-6 mb-4 mb-lg-0">

				</div>
			</div>
		</section>
		<!--Section: Content-->


	</div>
</main>
<!--Main layout-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<button id="AddDiscussionImages">Add Images</button>

				<form action="{{ route('DiscussionCreate') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-outline mb-4">
						<input type="text" name="title" id="form1Example1" class="form-control" />
						<label class="form-label" for="form1Example1">Topic</label>
					</div>

					<!-- Password input -->
					<div class="form-outline">
						<textarea class="form-control" name="content" id="textAreaExample1" rows="4"></textarea>
						<label class="form-label" for="textAreaExample">Discription</label>
					</div>

					<div class="imageroe" id="imageroe"></div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Add To Discussion</button>
					</div>

				</form>

			</div>

		</div>
	</div>
</div>


<script>
	let counter = 0
	document.getElementById('AddDiscussionImages').addEventListener('click', () => {
		const imageInput = document.createElement('input');
		imageInput.type = 'file';
		imageInput.classList.add('form-control', 'imagesclasses');
		imageInput.name = 'discussionImage' + counter; // Use "images[]" to make it an array
		imageInput.id = 'image' + counter;


		const descinput = document.createElement('input');
		descinput.type = 'text';
		descinput.classList.add('form-control', 'descs');
		descinput.id = 'desc' + counter;
		descinput.name = 'imageDiscussion' + counter;
		const label = document.createElement('label');
		label.setAttribute('for', 'desc ' + counter); // Set the '
		label.textContent = 'Description';


		const imagefilerow = document.createElement('div');
		imagefilerow.classList.add('row');
		imagefilerow.appendChild(imageInput);
		imagefilerow.append(label, descinput);


		let imageroe = document.getElementById('imageroe');
		imageroe.append(imagefilerow);
		imageroe.style.display = 'block';

		counter += 1;




	})
</script>


@endsection

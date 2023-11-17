@extends('layouts.app')
@section('content')


<style>
	#imageroe {
		display: none;
	}

	* {
		font-weight: 700;
	}

	.btn-sm {
		font-size: 8px;
		color: black;
		font-weight: 700;
	}

	input {
		font-weight: 700;
	}

	input::placeholder {
		color: white;
	}
</style>
DisCusiion List
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
							<h5>{{$discussion->title}}</h5>

							<p>
								{{$discussion->content}}
							</p>
						</a>

						<hr />

						<!-- News -->



						@foreach($discussion->Images as $desccontent)

						<div class="row mb-4 border-bottom pb-2">
							<div class="col-12">
								<img src="{{asset('storage/'.$desccontent->url)}}" class="img-fluid shadow-1-strong rounded" alt="" />
							</div>
						</div>
						<div class="mb-4 border-bottom pb-2">

							<div class="col-12">
								<div class="row">
									<div class="col-12">
										<p class="mb-2"><strong>{{$desccontent->desc}}</strong></p>


									</div>

								</div>

							</div>
						</div>
						@endforeach
						<div class="d-flex align-items-center mb-4">
							<div class="flex-shrink-0">
								<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-2.webp" alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3" style="width: 40px;">
							</div>
							<div class="flex-grow-1 ms-3">
								<div class="d-flex flex-row align-items-center mb-2">
									<p class="mb-0 me-2">{{$discussion->user->name}}</p>
									<ul class="mb-0 list-unstyled d-flex flex-row" style="color: #1B7B2C;">
										<li>
											<i class="fas fa-star fa-xs"></i>
										</li>
										<li>
											<i class="fas fa-star fa-xs"></i>
										</li>
										<li>
											<i class="fas fa-star fa-xs"></i>
										</li>
										<li>
											<i class="fas fa-star fa-xs"></i>
										</li>
										<li>
											<i class="fas fa-star fa-xs"></i>
										</li>
									</ul>
								</div>
								<div>
									<button type="button" class="btn btn-outline-dark btn-rounded btn-sm" data-mdb-ripple-color="dark">Reply</button>
									<button type="button" class="btn btn-outline-dark btn-rounded btn-sm" data-mdb-ripple-color="dark">See profile</button>
									<button type="button" class="btn btn-outline-dark btn-floating btn-sm" data-mdb-ripple-color="dark"><i class="fas fa-comment"></i></button>
								</div>
							</div>
						</div>
						<hr>
						<p class="my-4 pb-1">52 comments</p>

						@if($childDiscussions->count() > 0)
						<div>
							<h2 class="text-danger"><u> Discussions Reply</u></h2>
							<hr>
							@foreach($childDiscussions as $childDiscussion)
							<div class="d-flex align-items-start mb-4">
								<div class="flex-shrink-0">
									<img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-2.webp" alt="Generic placeholder image" class="img-fluid rounded-circle border border-dark border-3" style="width: 40px;">
								</div>
								<div class="flex-grow-1 ms-3">
									<div class="d-flex flex-row align-items-center mb-2">
										<p class="mb-0 me-2">{{$childDiscussion->user->name}}</p>
										<ul class="mb-0 list-unstyled d-flex flex-row" style="color: #1B7B2C;">
											<li>
												<i class="fas fa-star fa-xs"></i>
											</li>
											<li>
												<i class="fas fa-star fa-xs"></i>
											</li>
											<li>
												<i class="fas fa-star fa-xs"></i>
											</li>
											<li>
												<i class="fas fa-star fa-xs"></i>
											</li>
											<li>
												<i class="fas fa-star fa-xs"></i>
											</li>
										</ul>
									</div>
									<div>
										<p>{{ $childDiscussion->content }} xxxxxxxxxxxxx</p>
									</div>
									<div class="flex-shrink-0">

										<button type="button" class="btn btn-outline-dark btn-rounded btn-sm" data-mdb-ripple-color="dark" data-mdb-toggle="modal" data-mdb-target="#AnswerModal">
											Answer btn
										</button>

										<!-- Answer Discussion Modal -->
										<div class="modal fade" id="AnswerModal" tabindex="-1" aria-labelledby="AnswerModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered modal-lg">
												<div class="modal-content">
													<form action="{{ route('DiscussionCreate') }}" method="post">
														@csrf
														<input type="hidden" value="{{ $childDiscussion->id }}" name="parent_id">
														<div class="modal-header">

														</div>
														<div class="modal-body">
															<div class="form-outline">
																<input type="text" value="{{$childDiscussion->id}}">
																<textarea class="form-control" name="content" id="textAreaExample1" rows="4"></textarea>
																<label class="form-label" for="textAreaExample">Answer brief</label>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-success">Post Answer</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<!-- End Answer Modal  -->


									</div>
								</div>

							</div>
							<ul>
								<li>
									@foreach($discussion->replies as $reply)
									<p>{{ $reply->content }}</p>
									@endforeach
								</li>
							</ul>

							<!-- Add other fields as needed -->
							@endforeach
						</div>
						@endif


						<form action="{{ route('DiscussionCreate') }}" method="post" class="d-flex">
							@csrf
							<input type="hidden" value="{{ $discussion->id }}" name="parent_id">
							<input type="text" name="content" class="form-control me-2" id="" placeholder="Add Discussion Solution">
							<button type="submit" class="btn btn-link"><i class="fa-solid fa-right-long"></i></button>
						</form>
					</div>


				</div>



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



<!-- ---------------------------------------------------------- Modal Started ------------------------------------------- -->

<!-- Modal Add Discussion -->
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

<!-- End Add Modal Discussion  -->



<!-- Button trigger modal -->







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
@extends('layouts.app')
@section('content')


<main class="my-4">
	<div class="container">
		<!--Section: Content-->
		<section class="text-center">
			<h4 class="mb-4"><strong>Pricing</strong></h4>

			<div class="btn-group mb-4" role="group" aria-label="Basic example">
				
				<button type="button" class="btn btn-primary">
					Add Billing  <small>( 3 Posts FREE )</small>
				</button>
			</div>

			<div class="row gx-lg-5">


				<div class="col-2"></div>

				<!--Grid column-->
				<div class="col-lg-3 col-md-6 mb-4 justify-content-center">

					<!-- Card -->
					<div class="card border border-primary" style="max-width: 450px;">

						<div class="card-header bg-white py-3">
							<p class="text-uppercase small mb-2" id="planName"><strong>Essential</strong></p>
							<h5 class="mb-0" id="planPrice">$19 / <span id="planValidity">month</span> </h5>
						</div>

						<div class="card-body">
							<ul class="list-group list-group-flush" id="planContent">
								<li class="list-group-item">Plan Features</li>
								
							</ul>
						</div>

						<div class="card-footer bg-white py-3">
							<button type="button" class="btn btn-primary btn-sm">Buy now</button>
						</div>

					</div>
					<!-- Card -->

				</div>
				<!--Grid column-->

				<!--Grid column-->
				<div class="col-lg-5 col-md-6 mb-4">

					<!-- Card -->
					<div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
						<div class="card-body p-4 ">
							<form action="{{ route('createSubScription') }}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-12 mb-4">

										<div class="form-outline">
											<input type="text" name="subscriptionName" id="subscriptionName"
												class="form-control form-control-lg" />
											<label class="form-label" for="firstName">SubScription Plan Name</label>
										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-md-12 mb-4">

										<div class="form-outline">
											<input type="text" id="subscriptionPrice" name="subscriptionPrice"
												class="form-control form-control-lg" />
											<label class="form-label" for="lastName">Plan Price</label>
										</div>

									</div>
								</div>



								<div class="row">
									<div class="col-md-12 mb-4">
										<div class="form-outline">
											<textarea  class="form-control rounded-0"
												id="exampleFormControlTextarea2" rows="3"></textarea>
											<label class="form-label" for="firstName">SubScription Plan Content /
												Features</label>
												<input type="hidden" name="subscriptionContent" id="subscriptionContentid" >
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-6 mb-4">

										<select name="subscriptionTiming" id="subscriptionTiming" class="select form-control-lg">
											<option value="0" disabled>Choose option</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>

									</div>
									<div class="col-6 mb-4">

										<select name="subscriptionValidity" id="subscriptionValidity" class="select form-control-lg">
											<option value="0" disabled>Choose validaty</option>
											<option value="Week">Week</option>
											<option value="Month">Month</option>
											<option value="Year">Year</option>
										</select>

									</div>
								</div>

								<div class="row">
									<div class="col-md-12 mb-4">
										<div class="form-outline">
											<textarea name="subscriptionDesc" class="form-control rounded-0"
												id="exampleFormControlTextarea3" rows="3"></textarea>
											<label class="form-label" for="firstName">SubScription Plan
												Description</label>
										</div>
									</div>
								</div>




								<div class="mt-4 pt-2">
									<input class="btn btn-success btn-lg" type="submit" value="Submit" />
								</div>

							</form>
						</div>
					</div>
					<!-- Card -->

				</div>
				<!--Grid column-->
				<div class="col-2"></div>



			</div>
		</section>
		<!--Section: Content-->
	</div>
</main>


<script>
	let subscriptionName = document.getElementById("subscriptionName");
	let subscriptionPrice = document.getElementById("subscriptionPrice");
	let subscriptionContent = document.getElementById("exampleFormControlTextarea2");
	let subscriptionTiming = document.getElementById("subscriptionTiming");
	let subscriptionValidity = document.getElementById("subscriptionValidity");
	let subscriptionDesc = document.getElementById("subscriptionDesc");
	let subscriptionContentid = document.getElementById("subscriptionContentid");

	let planName = document.getElementById("planName");
	let planPrice = document.getElementById("planPrice");
	let planValidity = document.getElementById("planValidity");
	let planContent = document.getElementById("planContent");
	
	
	subscriptionName.addEventListener("keyup", (event) => {
		
		planName.innerHTML = event.target.value;
	});

	subscriptionPrice.addEventListener("keyup", (event) => {
		
		planPrice.innerHTML = event.target.value;
	});

	subscriptionContent.addEventListener("keydown", (event) => {
    if (event.key === "Enter" && !event.shiftKey) {
        event.preventDefault(); // Prevent the newline character from being inserted

        // Create a new list item (li) with the entered text
        const newFeature = document.createElement("li");
        newFeature.className = "list-group-item";
        newFeature.textContent = event.target.value.trim();

        // Append the new list item to the list
        planContent.appendChild(newFeature);

        // Append the entered text to the subscriptionContentid
        subscriptionContentid.value += event.target.value.trim() + ',';

        // Clear the textarea content
        subscriptionContent.value = "";
    	}
	});


	subscriptionValidity.addEventListener("keyup", (event) => {
		
		planValidity.innerHTML = event.target.value;
	});

	

</script>


@endsection
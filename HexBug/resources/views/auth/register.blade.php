@extends('layouts.app')
@section('content')
<style>
	.divider:after,
	.divider:before {
		content: "";
		flex: 1;
		height: 1px;
		background: #eee;
	}

	.h-custom {
		height: calc(100% - 73px);
	}

	@media (max-width: 450px) {
		.h-custom {
			height: 100%;
		}
	}

	* {
		font-weight: 700;
	}
</style>

@include('layouts.Navbar')
<section class="vh-100">
	<div class="container-fluid h-custom">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
				<form action="" method="post">
					@csrf
					<div class="text-center mb-3">
						<p>Sign in with:</p>
						

						 <a href="{{ route('RedirectToGoogle') }}" class="btn btn-lg btn-block btn-primary" style="background-color: rgb(57, 142, 221) 101, 221; font-weight:400;">
              <i class="fab fa-google me-2"></i> Sign in with google
            </a>

					</div>

					<div class="divider d-flex align-items-center my-4">
						<p class="text-center fw-bold mx-3 mb-0">Or</p>
					</div>

					@if (session('error'))
					<div id="messageSession" class="alert alert-danger">
						{{ session('error') }}
					</div>
				@elseif(session('success'))
					<div id="messageSession" class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

					<!-- Email input -->
					<div class="form-outline mb-4">
						<input type="email" id="form3Example3" class="form-control form-control-lg"
							name="email" placeholder="Enter a valid email address" />
						<label class="form-label" for="form3Example3">Email address</label>
					</div>

					<!-- Password input -->
					<div class="form-outline mb-4">
						<input type="password" id="form3Example4" class="form-control form-control-lg"
							name="password" placeholder="Enter password" />
						<label class="form-label" for="form3Example4">Password</label>
					</div>

					<!-- Password input -->
					<div class="form-outline mb-3">
						<input type="password" id="form3Example5" class="form-control form-control-lg"
							name="password_confirmation" placeholder="Enter password" />
						<label class="form-label" for="form3Example5">Retype Password</label>
					</div>

					<div class="d-flex justify-content-between align-items-center">
						<!-- Checkbox -->
						<div class="form-check mb-0">
							<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
							<label class="form-check-label" for="form2Example3">
								Remember me
							</label>
						</div>
						<a href="#!" class="text-body">Forgot password?</a>
					</div>

					<div class="text-center text-lg-start mt-4 pt-2">
						<button type="submit" class="btn btn-primary btn-lg"
							style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
						<p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="{{ route('login') }}"
								class="link-danger">Login</a></p>
					</div>

				</form>
			</div>
			<div class="col-md-9 col-lg-6 col-xl-5">
				<img src="https://img.freepik.com/free-vector/recruit-agent-analyzing-candidates_74855-4565.jpg?w=826&t=st=1699957378~exp=1699957978~hmac=754ae72e09dcd89b7eb4a3003c634d4ce78cb39b9edfba085d42137450db97c6"
					class="img-fluid" alt="Sample image">
			</div>

		</div>
	</div>

</section>

<script>
	let ShowPassword = document.getElementById("form2Example3");
	ShowPassword.addEventListener('click' , ()=>{
		let passwordField = document.querySelector('#form3Example4');
		let ConfirmPassField = document.querySelector("#form3Example5");
	if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
	if (ConfirmPassField.type === "password"){
		ConfirmPassField.type = "text";
        } else {
            ConfirmPassField.type = "password";
        }
	}
	)
	
</script>

@endsection
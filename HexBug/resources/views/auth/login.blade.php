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
*{
	font-weight: 700;
}
</style>

@include('layouts.Navbar')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://img.freepik.com/free-vector/global-data-security-personal-data-security-cyber-data-security-online-concept-illustration-internet-security-information-privacy-protection_1150-37336.jpg?w=740&t=st=1699957196~exp=1699957796~hmac=140bb9d07d1354bd9a96eb6815a3f04b3adf6f5005c9dc0cf66f14e81131aa6f"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{ route('authenticate') }}" method="post" >
			@csrf
		<div class="text-center mb-3">
        <p>Sign in with:</p>
        <a href="{{ route('RedirectToFacebook') }}" class="btn btn-lg btn-block btn-primary" style="background-color: rgb(57, 142, 221) 101, 221;">
    						<i class="fab fa-facebook-f me-2"></i>  Sign in with Facebook
				</a>

       
        <a href="{{ route('RedirectToGoogle') }}" class="btn btn-lg btn-block btn-primary" style="background-color: rgb(57, 142, 221) 101, 221;">
              <i class="fab fa-google me-2"></i> Sign in with google
        </a>

        <!-- <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button> -->
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
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              name="password" placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
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
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>

<script>
	let ShowPassword = document.getElementById("form2Example3");
	ShowPassword.addEventListener('click' , ()=>{
		let passwordField = document.getElementById('form3Example4');
	if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
	})





	
</script>

@endsection
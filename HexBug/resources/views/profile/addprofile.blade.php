@extends('layouts.app')
@section('content')

<form action="{{ route('addRequestUserdb' , ['id'=>$user->id])}}" enctype="multipart/form-data" method="post">
    @csrf

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" id="showimage" style="width: 150px; height: 150px; object-fit: cover;">

              <!-- username  -->
              <div class="form-outline mb-4 mt-4">
                <input type="text" id="form2Example22" name="username" class="form-control" value="{{ $user->username}}" />
                <label class="form-label" for="form2Example22">Username</label>
              </div>  

            <!-- Position -->
            <div class="form-outline mb-4">
                <input type="text" id="form2Example22" name="status" class="form-control"   value="{{ $user->status}}" />
                <label class="form-label" for="form2Example22">Position</label>
            </div>

            <!-- address  -->
            <div class="form-outline mb-4">
                <textarea type="text" id="form2Example22"  class="form-control"  name="address" value="{{ $user->address}}" cols="30" rows="3"></textarea>
                <label class="form-label" for="form2Example22">Address</label>
              </div>
           
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Clear</button>
              <button type="submit" class="btn btn-outline-primary ms-1">Save Changes</button>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">

              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
                    <!-- Full NAme  -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example22"  class="form-control"  name="fullname" value="{{ $user->name}}" />
                        <label class="form-label" for="form2Example22">Full Name</label>
                    </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <!-- email  -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example22"  class="form-control"  name="email" value="{{ $user->email}}" />
                        <label class="form-label" for="form2Example22">Email</label>
                    </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <!-- email  -->
                <div class="form-outline mb-4">
                    <input type="number" id="form2Example22"  class="form-control"  name="number" value="{{ $user->number}}" />
                    <label class="form-label" for="form2Example22">Phone Number</label>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <!-- email  -->
                <div class="form-outline mb-4">
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Profile Pic</p>
              </div>
              <div class="col-sm-9">
               <input type="file" name="image" class="form-control" id="propic" accept="image/*">
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook fa-lg text-primary px-5"></i>
                <input type="text" class="form-control" name="facebook" placeholder="https://facebook.com">
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg px-5" style="color: #333333;"></i>
                <input type="text"  class="form-control" name="github" placeholder="https://github.com">
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg px-5" style="color: rgb(209, 65, 202);"></i>
                <input type="text"   class="form-control" name="instagram" placeholder="https://instagram.com">
              </li>
              
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
</form>


<script>
    document.getElementById('propic').addEventListener('change' , (e) =>{
        let image = e.target.files[0]
        if (image) {
        let showImage = URL.createObjectURL(image); // Create a URL for the selected image
        document.getElementById('showimage').src = showImage; // Set the source of the 'showimage' element to the URL
    } else {
        // Handle the case where no image is selected
        console.log('No image selected.');
    }})

</script>



@endsection
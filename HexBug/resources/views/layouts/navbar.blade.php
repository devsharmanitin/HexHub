<style>
  .nav-bar {
    background-color: transparent;
    color: rgb(34, 34, 34);
    width: 85%;
  }

  .py-5 {
    padding-bottom: 3rem !important;
    padding-top: 3rem !important;
  }

  .container,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl {
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    scroll-behavior: smooth;
  }

  .nav-bar .nav-body,
  .nav-bar .nav-right {
    align-items: center;
    display: flex;
    justify-content: space-between;
  }

  .nav-bar .nav-body,
  .nav-bar .nav-right {
    align-items: center;
    display: flex;
    justify-content: space-between;
  }



  .nav-bar .nav-body .nav-menu a {
    font-size: 16px;
    font-weight: 700;
    padding: 0 1rem;
  }

  .nav-bar .nav-body .nav-menu a,
  .nav-bar .nav-logo a {
    color: rgb(34, 34, 34);
    text-decoration: none;
    transition: .4s ease-in-out;
  }

  .navbar {
    --mdb-navbar-box-shadow: 0;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <a href="#" target="_blank" style="text-decoration: none;">
      <div class="text-center text-white py-2" style="background: linear-gradient(45deg, rgb(64, 93, 230), rgb(88, 81, 219), rgb(131, 58, 180), rgb(193, 53, 132), rgb(225, 48, 108), rgb(253, 29, 29)); font-size: 13px; font-weight: 400;">
        <i class="fab fa-instagram"></i> We have also on instagram 🎉 Follow us
      </div>
    </a>

    <div class="container">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
              <ion-icon name="logo-paypal"></ion-icon><span class="logo-text" style="font-weight: 600;">YTHONWORLD.IO</span></a>
            <!-- Left links -->

            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->


          <!-- Right elements -->
          <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="text-reset me-3" href="{{ route('index') }}" style="font-weight: 600;">
              Overview
            </a>

            <a class="text-reset me-3" href="{{ route('blogposts') }}" style="font-weight: 600;">
              Blogs
            </a>

            <a class="text-reset me-3" href="{{ route('createblog') }}" style="font-weight: 600;">
              Write
            </a>



            <!-- Notifications -->
            <div class="dropdown">
              <a class="text-reset me-3 dropdown-toggle hidden-arrow" style="font-weight: 600;" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                Subscription
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="{{ route('Subscriptionplans') }}" style="font-weight: 600;">Plan's</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('createsubscriptiontemp') }}" style="font-weight: 600;">Write Subscription</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#" style="font-weight: 600;">Something else here</a>
                </li>
              </ul>
            </div>


            <div class="searchboc">
              <button type="button" class="btn btn-link" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                <i class="fa-sharp fa-solid fa-magnifying-glass fa-lg"></i>
              </button>
            </div>

            <!-- Avatar -->
            <div class="dropdown">
              <a class="dropdown-toggle d-flex align-items-center hidden-arrow" style="font-weight: 600;" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                <li>
                  @if(auth()->check())
                  <a class="dropdown-item" href="" style="font-weight: 600;">My profile</a>
                  @else
                  <!-- Handle the case when the user is not authenticated, e.g., display a login link -->
                  <a class="dropdown-item" href="{{ route('login') }}" style="font-weight: 600;">Login</a>
                  @endif
                </li>
                <li>
                  <a class="dropdown-item" href="#" style="font-weight: 600;">Settings</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('friendscontact') }}" style="font-weight: 600;">Contact</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('DiscussionList') }}" style="font-weight: 600;">Discussion</a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" style="font-weight: 600;">Logout</a>
                </li>
              </ul>
            </div>

          </div>
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->


    </div>
  </div>
</div>

<!-- Button trigger modal -->

<form action="{{ route('SearchBlog') }}" method="post">
  @csrf
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Search Content</h6>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex">
          <div class="form-outline">
            <input type="search" id="form1" name="searchItem" class="form-control" placeholder="Type query" aria-label="Search" />
            <label for="form1" class="form-label">Search Here </label>
          </div>
          <button type="submit" class="btn btn-secondary"> <i class="fa-sharp fa-solid fa-magnifying-glass fa-lg"></i> </button>
        </div>

      </div>
    </div>
  </div>
</form>
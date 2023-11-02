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
    margin-left: auto;
    margin-right: auto;
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
}.nav-bar .nav-body, .nav-bar .nav-right {
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

</style>
<div class="container-fluid">
	<div class="row">
	<a href="#" target="_blank" style="text-decoration: none;">
  <div class="text-center text-white py-2" 
    style="background: linear-gradient(45deg, rgb(64, 93, 230), rgb(88, 81, 219), rgb(131, 58, 180), rgb(193, 53, 132), rgb(225, 48, 108), rgb(253, 29, 29)); font-size: 13px; font-weight: 400;">
    <i class="fab fa-instagram"></i> We have also on instagram 🎉 Follow us
  </div>
</a>

  <div class="container">
    <nav class="py-5 nav-bar container">
      <div class="nav-container">
        <div class="nav-body">
          <div class="nav-logo">
            <ion-icon name="logo-paypal"></ion-icon><span class="logo-text" style="font-weight: 600;">YTHONWORLD.IO</span>
          </div>
          <div class="nav-right">
            <div class="nav-menu">
              <a class="nav-logo" href="/contact"><span class="logo-text" style="font-weight: 600;">Overview</span></a>
              <a class="inactive-nav" href="/contact"><span class="logo-text" style="font-weight: 600;">Blogs</span></a>
              <a class="inactive-nav" href="/contact"><span class="logo-text" style="font-weight: 600;">About</span></a>
              <a class="inactive-nav" href="/contact"><span class="logo-text" style="font-weight: 600;">Contact</span></a>
            </div>
          </div>
        </div>
      </div>
    </nav>                                                                                              
  </div>
	</div>	
</div>

@endsection
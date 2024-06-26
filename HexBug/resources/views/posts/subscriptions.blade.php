@extends('layouts.app')
@section('content')



  <!--Main layout-->
  <main class="my-4">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-4"><strong>Pricing</strong></h4>

        <div class="btn-group mb-4" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-primary active">Monthly billing</button>
          <button type="button" class="btn btn-primary">
            Annual billign <small>(2 months FREE)</small>
          </button>
        </div>

        <div class="row gx-lg-5">

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Free</strong></p>
                <h5 class="mb-0">Free</h5>
              </div>

              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                </ul>
              </div>

              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-success btn-sm">Get it</button>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card border border-primary">

              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Essential</strong></p>
                <h5 class="mb-0">$19/month</h5>
              </div>

              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
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
          <div class="col-lg-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Advanced</strong></p>
                <h5 class="mb-0">$49/month</h5>
              </div>

              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                </ul>
              </div>

              <div class="card-footer bg-white py-3">
                <button type="button" class="btn btn-info btn-sm">Buy now</button>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <div class="card-header bg-white py-3">
                <p class="text-uppercase small mb-2"><strong>Enterprise</strong></p>
                <h5 class="mb-0">$189/month</h5>
              </div>

              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                  <li class="list-group-item">Feature</li>
                </ul>
              </div>

              <div class="card-footer bg-white py-3">
                <a href="{{ route('Checkout') }}" class="btn btn-info btn-sm">Buy now</a>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!--Grid column-->

        </div>
      </section>
      <!--Section: Content-->
    </div>
  </main>
  <!--Main layout-->




@endsection
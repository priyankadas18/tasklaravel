@extends('backend.layout.main')

@section('main')

<main id="main" class="main" style="
    height: 77vh;
">
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/backend/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Sales Card -->

          <div class="col-xxl-6 col-md-6">
            <div class="card info-card revenue-card">
              <div class="filter">
              </div>
              <div class="card-body">
                <h5 class="card-title">Profile Details</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-circle"></i>
                  </div>
                  <div class="ps-3">
                    <p><strong>Full Name:</strong> {{ $user->full_name }}</p>
                    <p><strong>Date of Birth:</strong> {{ $user->dob}}</p>
                    <p><strong>Profession:</strong> {{ $user->profession }}</p>
                    <p><strong>Address:</strong> {{ $user->address }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

  </section>
</main>
@endsection



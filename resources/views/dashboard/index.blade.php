@extends('layouts.app')
@section('content')
<!--/ Total Revenue -->
{{-- col-md-8 col-lg-4 order-3 order-md-2 --}}
<div class="col-12">
  <div class="row">
    <div class="col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
            </div>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="cardOpt4"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
              </div>
            </div>
          </div>
          <span class="d-block mb-1">Total Students</span>
          <h3 class="card-title text-nowrap mb-2">{{ $counts['student_count'] }}</h3>
          {{-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
        </div>
      </div>
    </div>
    <div class="col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
            </div>
            <div class="dropdown">
              <button
                class="btn p-0"
                type="button"
                id="cardOpt1"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="cardOpt1">
                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
              </div>
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Total Courses</span>
          <h3 class="card-title mb-2">{{ $counts['course_count'] }}</h3>
        </div>
      </div>
    </div>
    <!-- </div>
<div class="row"> -->

  </div>
</div>
@endsection
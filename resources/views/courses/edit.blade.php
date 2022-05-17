@extends('layouts.app');
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Students/ <a href="{{ route('courses.index') }}">All Courses</a> / </span>New Course</h4>
<div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"></h5>
                      <small class="text-muted float-end">Edit course</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('courses.update', $course) }}">
                          @csrf
                          @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="course_name">Course Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="course_name" id="course_name" value="{{ $course->course_name }}" />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
              </div>
@endsection
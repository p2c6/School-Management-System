@extends('layouts.app');
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subjects/ <a href="{{ route('subjects.index') }}">All Subjects</a> / </span>New Subject</h4>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"></h5>
                      <small class="text-muted float-end">Edit subject</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('subjects.update', $subject) }}">
                          @csrf
                          @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="subject_code">Subject Code</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject_code" id="subject_code" value="{{ $subject->subject_code }}" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="subject_name">Subject Name</label>
                          <div class="col-sm-10">
                            <input id="subject_name" name="subject_name" class="form-control" value="{{ $subject->subject_name }}" />
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="unit">Unit(s)</label>
                            <div class="col-sm-10">
                              <input id="unit" name="unit" class="form-control" value="{{ $subject->unit }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Course</label>
                          <div class="col-sm-10">
                            <select name="course_id" id="course_id" class="form-control" placeholder="Select course">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option class="form-control" 
                                     value="{{ $course->id}}"
                                     {{ $course->id == $subject->course_id ? 'selected' : ''}}
                                     >{{ $course->course_name }}</option>
                                @endforeach
                            </select>
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
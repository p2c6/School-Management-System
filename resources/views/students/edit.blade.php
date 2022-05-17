@extends('layouts.app');
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Students/ <a href="{{ route('students.index') }}">All Students</a> / </span>Edit Student</h4>
<div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0"></h5>
                      <small class="text-muted float-end">Editing student</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('students.update', $student) }}">
                          @csrf
                          @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="full_name">Full Name</label>
                          <div class="col-sm-10">
                            <input type="text" value="{{ $student->full_name }}" class="form-control" name="full_name" id="full_name" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="Address">Address</label>
                          <div class="col-sm-10">
                            <input id="address" name="address" class="form-control" value="{{ $student->address }}" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Gender</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select name="gender" id="" class="form-control" placeholder="Select gender">
                                    <option value="">Select Gender</option>
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender['val']}}"
                                        {{ $gender['val'] == $student['gender'] ? 'selected' : '' }}
                                        >{{ $gender['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Course</label>
                          <div class="col-sm-10">
                            <select name="course_id" id="" class="form-control" placeholder="Select course">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option class="form-control" 
                                     value="{{ $course->id}}"
                                    {{ $course->id == $student->course_id ? 'selected' : ''}}
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
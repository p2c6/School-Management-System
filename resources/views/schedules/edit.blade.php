@extends('layouts.app');
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Schedules/ <a href="{{ route('schedules.index') }}">All Schedules</a> / </span>New Schedule</h4>
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
                      <small class="text-muted float-end">Adding new schedule</small>
                    </div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('schedules.update', $schedule) }}">
                          @csrf
                          @method('PUT')
                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Course</label>
                        <div class="col-sm-10">
                            <select name="course_id" id="" class="form-control" placeholder="Select course">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option class="form-control" 
                                    value="{{ $course->id}}"
                                    {{ $course->id == $schedule->course_id ? 'selected': ''}}
                                    >{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Subject</label>
                        <div class="col-sm-10">
                            <select name="subject_id" id="" class="form-control" placeholder="Select subject">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option class="form-control" 
                                    value="{{ $subject->id}}"
                                    {{ $subject->id == $schedule->subject_id ? 'selected': ''}}
                                    >{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Subject</label>
                        <div class="col-sm-10">
                            <select name="professor_id" id="" class="form-control" placeholder="Select professor">
                                <option value="">Select Professor</option>
                                @foreach($professors as $professor)
                                    <option class="form-control" 
                                    value="{{ $professor->id}}"
                                    {{ $professor->id == $schedule->professor_id ? 'selected': ''}}
                                    >{{ $professor->professor_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="schedule_time">Schedule Time</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="schedule_time" id="schedule_time" value="{{  $schedule->schedule_time }}" />
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="schedule_time">Schedule Day</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="schedule_day" id="schedule_day" value="{{ $schedule->schedule_day }}" />
                            </div>
                          </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
              </div>
@endsection
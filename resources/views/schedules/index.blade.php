@extends('layouts.app')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Schedules /</span> All Schedules</h4>
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
                <h5 class="card-header"><a href="{{ route('schedules.create') }}">Add new schedule</a></h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Professor</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($schedules as $schedule)
                        <tr>
                          <td>{{ $schedule->course->course_name }}</td>
                          <td>{{ $schedule->subject->subject_name }}</td>
                          <td>{{ $schedule->professor->professor_name }}</td>
                          <td>{{ $schedule->schedule_day }}</td>
                          <td>{{ $schedule->schedule_time }}</td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('schedules.edit', $schedule) }}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form method="POST" action={{ route('schedules.destroy', $schedule) }}>
                                  @csrf
                                  @method('DELETE')
                                  <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete this record?')"
                                  ><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  {{ $schedules->links() }}
                </div>
              </div>

@endsection
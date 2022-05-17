@extends('layouts.app')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Students /</span> All Students</h4>
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
                <h5 class="card-header"><a class="btn btn-primary" href="{{ route('students.create') }}">Add new student</a> <a class="btn btn-outline-primary" href="{{ route('students.export') }}">Export Students Data</a></h5>
                <h5></h5>
                <div class="table-responsive text-nowrap">
                  <?php $i = 1; ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($students as $student)
                        <tr>
                          <td>{{ $student->full_name }}</td>
                          <td>{{ $student->address }}</td>
                          <td>{{ $student->gender }}</td>
                          <td>{{ $student->course->course_name }}</td>
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
                                <a class="dropdown-item" href="{{ route('students.edit', $student) }}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form method="POST" action={{ route('students.destroy', $student) }}>
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
                  {{ $students->links() }}
                </div>
              </div>

@endsection
@extends('layouts.app')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subjects /</span> All Subjects</h4>
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
                <h5 class="card-header"><a href="{{ route('subjects.create') }}">Add new subject</a></h5>
                <div class="table-responsive text-nowrap">
                  <?php $i = 1; ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Subject Unit</th>
                        <th>Course</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($subjects as $subject)
                        <tr>
                          <td>{{ $subject->subject_code }}</td>
                          <td>{{ $subject->subject_name }}</td>
                          <td>{{ $subject->unit }}</td>
                          <td>{{ $subject->course->course_name }}</td>

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
                                <a class="dropdown-item" href="{{ route('subjects.edit', $subject) }}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form method="POST" action={{ route('subjects.destroy', $subject) }}>
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
                  {{ $subjects->links() }}
                </div>
              </div>

@endsection

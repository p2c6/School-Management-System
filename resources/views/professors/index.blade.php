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
                <h5 class="card-header"><a href="{{ route('professors.create') }}">Add new professor</a></h5>
                <div class="table-responsive text-nowrap">
                  <?php $i = 1; ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Professor Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($professors as $professor)
                        <tr>
                          <td>{{ $professor->professor_name }}</td>
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
                                <a class="dropdown-item" href="{{ route('professors.edit', $professor) }}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <form method="POST" action={{ route('professors.destroy', $professor) }}>
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
                  {{ $professors->links() }}
                </div>
              </div>

@endsection

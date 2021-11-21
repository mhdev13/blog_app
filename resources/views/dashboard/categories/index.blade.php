@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Categories</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
    <table id="allpost" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Slug</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#view{{ $category->id }}">
                  <span data-feather="eye"></span></a>
                </button>
                <a href="/dashboard/categories/{{ $category->id }}/edit" button type="button" class="btn btn-warning mb-3"><span data-feather="edit"></span></button>
                </a>
                <form action="/dashboard/categories/{{ $category->id }}" method="POST" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger mb-3" onclick="return confirm('Are You Sure ?')">
                    <span data-feather="x-circle"></span>
                  </button>
                </form>
            </td>
          </tr>

          <!---modal view -->
          <div class="modal fade" id="view{{ $category->id }}" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="viewLabel">View Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                      <label class="col-form-label">Category Name:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}">
                    </div>

                    <div class="mb-3">
                      <label class="col-form-label">Slug:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}">
                    </div>

                    <div class="mb-3">
                      <label class="col-form-label">Description:</label>
                      <textarea type="text" class="form-control" name="description" value="{{ old('slug', $category->description) }}">{{ $category->description }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!--end modal view -->

          @endforeach
      </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" rel="stylesheet"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" rel="stylesheet"></script>

<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" rel="stylesheet"></script>

<script>
$(document).ready(function() {
    $('#allpost').DataTable();
});
</script>

@endsection
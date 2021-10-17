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
   <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create" data-bs-whatever="@mdo">Create New Category</button>
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
                  <span data-feather="eye"></span></a></button>
                <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#edit{{ $category->id }}">
                  <span data-feather="edit"></span>
                </button>
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
                  <form method="post" id="update_form" action="/dashboard/categories/{{ $category->id }}" class="mb-5">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label class="col-form-label">Category Name:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="name" name="name" disabled value="{{ old('name', $category->name) }}">
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="col-form-label">Slug:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disabled value="{{ old('slug', $category->slug) }}">
                      @error('slug')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="col-form-label">Description:</label>
                      <textarea type="text" class="form-control" name="description" disabled value="{{ old('slug', $category->description) }}">{{ $category->description }}</textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <!--end modal view -->

          <!---modal edit -->
          <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post" id="update_form" action="/dashboard/categories/{{ $category->id }}" class="mb-5">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                      <label class="col-form-label">Category Name:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $category->name) }}">
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="col-form-label">Slug:</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $category->slug) }}">
                      @error('slug')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="col-form-label">Description:</label>
                      <textarea type="text" class="form-control" name="description" value="{{ old('slug', $category->description) }}">{{ $category->description }}</textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button onclick="form_update()" type="submit" class="btn btn-primary">Update Category</button>
                </div>
              </div>
            </div>
          </div>
          <!--end modal edit -->
          @endforeach
      </tbody>
    </table>

    <!---modal create -->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createLabel">Create Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" id="submit_form" action="/dashboard/categories" class="mb-5">
              @csrf
              <div class="mb-3">
                <label class="col-form-label">Category Name:</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Slug:</label>
                <input type="text" class="form-control" name="slug" id="slug">
              </div>
              <div class="mb-3">
                <label class="col-form-label">Description:</label>
                <textarea class="form-control" name="description" id="description"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button onclick="form_submit()" type="submit" class="btn btn-primary">Create Category</button>
          </div>
        </div>
      </div>
    </div>
    <!--end modal create -->
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
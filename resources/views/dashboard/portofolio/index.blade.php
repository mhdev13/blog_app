@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Portofolio</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
   <a href="/dashboard/portofolio/create" class="btn btn-primary mb-3">Create New Portofolio</a>
    <table id="allpost" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Url</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($portofolio as $porto)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $porto->title }}</td>
          <td>{{ $porto->category}}</td>
          <td>{{ $porto->description}}</td>
          <td>{{ $porto->url}}</td>
          <td>{{ $porto->status}}</td>
          <td>
            <button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#view{{ $porto->id }}"><span data-feather="eye"></span></button>
            <a href="/dashboard/portofolio/{{ $porto->id }}/edit" button type="button" class="btn btn-warning mb-3"><span data-feather="edit"></span>
            </a>
            <form action="/dashboard/portofolio/{{ $porto->id }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger mb-3" onclick="return confirm('Are You Sure ?')">
                <span data-feather="x-circle"></span>
              </button>
            </form>
          </td>
        </tr>

        <!---modal view -->
        <div class="modal fade" id="view{{ $porto->id }}" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="viewLabel">View Portofolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $porto->title) }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">porto Image</label>
                    <input type="hidden" name="oldImage" value="{{ $porto->image }}">
                    @if($porto->image)
                        <img src="{{ asset('storage/' . $porto->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                </div>
        
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        <option value="freelance" {{ $porto->category == "freelance" ? 'selected' : ''}}>Freelance</option>
                        <option value="main" {{ $porto->category == "main" ? 'selected' : ''}}>Main Job</option>
                    </select>
                </div>
                
                <div class="mb-3">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status">
                      <option value="active" {{ $porto->status == "active" ? 'selected' : ''}}>active</option>
                      <option value="inactive" {{ $porto->status == "inactive" ? 'selected' : ''}}>inactive</option>
                  </select>
                </div>
                
                <div class="mb-3">
                    <label class="col-form-label">Description:</label>
                    <textarea type="text" class="form-control" name="description" value="{{ old('description', strip_tags($porto->description)) }}">{{ strip_tags($porto->description) }}</textarea>
                </div>

                <div class="mb-3">
                  <label for="url" class="form-label">Url</label>
                  <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" required autofocus value="{{ old('url',$porto->url) }}">
                  @error('url')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
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
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
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($portofolio as $porto)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $porto->title }}</td>
          <td>{{ $porto->category}}</td>
          <td>
              <a href="/dashboard/portofolio/{{ $porto->id }}" button type="button" class="btn btn-info mb-3"><span data-feather="eye"></span></button>
              </a>
              <a href="/dashboard/portofolio/{{ $porto->id }}/edit" button type="button" class="btn btn-warning mb-3"><span data-feather="edit"></span></button>
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
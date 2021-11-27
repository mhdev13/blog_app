@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Portofolio</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/portofolio/{{ $portofolio->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $portofolio->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Portofolio Image</label>
            <input type="hidden" name="oldImage" value="{{ $portofolio->image }}">
            @if($portofolio->image)
                <img src="{{ asset('storage/' . $portofolio->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category">
                <option value="freelance" {{ $portofolio->category == "freelance" ? 'selected' : ''}}>Freelance</option>
                <option value="main" {{ $portofolio->category == "main" ? 'selected' : ''}}>Main Job</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            @error('description')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="description" type="hidden" name="description" value="{{ old('description'), strip_tags($portofolio->description) }}">
            <trix-editor input="description">{{ strip_tags($portofolio->description) }}</trix-editor>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="active" {{ $portofolio->status == "active" ? 'selected' : ''}}>active</option>
                <option value="inactive" {{ $portofolio->status == "inactive" ? 'selected' : ''}}>inactive</option>
            </select>
          </div>

        <a href="/dashboard/portofolio" class="btn btn-secondary">Back to Portofolio</a>
        <button type="submit" class="btn btn-primary">Update Post</button>

    </form>
</div>

@endsection
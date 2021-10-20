@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/categories/{{ $category->id }}" class="mb-5" enctype="multipart/form-data">
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

        <button onclick="goBack()" class="btn btn-secondary">Back to My Post</a></button>
        <button type="submit" class="btn btn-primary">Update Post</button>

    </form>
</div>

@endsection
@extends('layouts.app1')
@section('title','')
@section('main-content')

<div class= "fs-4 mt-3 ms-5 package-lead fw-semibold"><span><a href="{{ route('posts') }}" class="text-decoration-none fs-4 text-dark package-lead fw-semibold">Posts</a></span> > Add Post</div>

<div class="container my-3 py-5">
   <div class="card w-50 h-auto mx-auto shadow package-lead p-4">
        <form action="{{ route('update_post', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
                <label for="postName" class="form-label fs-5">Post Name</label>
                <input type="text" class="form-control fs-5" id="postName" placeholder="Enter your post title" name="title" value="{{$data->title}}">
                @error('title')
                   <span class="text-danger fw-semibold">Error message goes here</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="postContent" class="form-label fs-5">Post Content</label>
                <textarea class="form-control fs-5" id="postContent" rows="5" placeholder="Enter your content" name="content">{{ $data->content }}</textarea>
                @error('content')
                    <span class="text-danger fw-semibold">Error message goes here</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="profile" class="form-label fs-5">Add Image</label>
                <input type="file" class="form-control fs-5" id="image" name="image" accept="image/*">
                <img src="/posts/{{$data->image}}" alt="Current Image" class="mt-2" width="150">
                @error('image')
                    <span class="text-danger fw-semibold">Error message goes here</span>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success text-white fs-5 ms-auto py-1 px-4">Save</button>
            </div>

            @if (session('message'))
                <div class="alert alert-success mt-3 fs-5">
                    {{ session('message') }}
                </div>
             @endif

        </form>
    </div>
</div>

@endsection
@section('styles')

@endsection
@section('scripts')

@endsection
@extends('layouts.app1')
@section('title','')
@section('main-content')

<div class= "fs-4 mt-3 ms-5 fs-1 fw-semibold text-center">My Posts</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 d-flex justify-content-between align-items-center">
                <span>{{ __("You're ready to explore!") }}</span>
                <a href="{{ route('add_post') }}" class="btn btn-primary ms-sm-5">+ ADD POSTS </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 m-3">
    <!-- Post Card -->
    @foreach($post as $posts)
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card shadow p-3 d-flex flex-row align-items-start">
            <!-- Image -->
            <img src="posts/{{$posts->image}}" 
                 class="rounded me-3 mb-3 mb-md-0 mx-auto mx-md-0 display-img" 
                 alt="Package Image" 
                 style="width: 120px; height: 120px; object-fit: cover;">
            <!-- Content -->
            <div class="flex-grow-1">
                <!-- Title -->
                <h3 class="mb-2 fw-bold mx-3">{{$posts->title}}</h3>
                <!-- Content -->
                <p class="mb-2 text-muted mx-3">{{$posts->content}}</p>
                <p class="mb-2 text-muted mx-3">Created at:{{ $posts->created_at->format('M d, Y') }} </p>
                <!-- Social Media -->
                <p class="mb-3 mx-3">
                    <a href="#" class="text-decoration-none text-primary me-2">Instagram</a>|
                    <a href="#" class="text-decoration-none text-primary mx-2">Facebook</a>|
                    <a href="#" class="text-decoration-none text-primary ms-2">Twitter</a>
                </p>
                <!-- Buttons -->
                <div class="d-flex">
                    <a href="#" class="btn btn-primary btn-sm me-2">View Post</a>
                    <a href="{{ route('edit_post', $posts->id) }}" class="btn btn-success btn-sm me-2">
                        Update Post
                    </a>
                    <a href="{{ route('delete_post', $posts->id) }}" class="btn btn-danger btn-sm">
                        Delete Post
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination d-flex flex-column align-items-center my-4 py-3">
               {{$post->links()}}
</div>

@endsection
@section('styles')

@endsection
@section('scripts')

@endsection
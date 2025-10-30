@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-4">Posts</h1>

    <form method="GET" class="row mb-4 g-2">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search by title">
        </div>
        <div class="col-md-3">
            <select name="source" class="form-select" onchange="this.form.submit()">
                <option value="">All Sources</option>
                @foreach ($sources as $source)
                    <option value="{{ $source }}" @selected(request('source') == $source)>
                        {{ ucfirst($source) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($post->content, 100) }}</p>
                        <a href="{{ route('posts.public.show', $post) }}" class="btn btn-sm btn-outline-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted small">
                        Source: {{ $post->source }}
                    </div>
                </div>
            </div>
        @empty
            <p>No posts found.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection

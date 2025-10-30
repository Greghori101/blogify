@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <div class="text-muted mt-3">
                Source: {{ $post->source }} | Published on {{ $post->created_at->format('M d, Y') }}
            </div>
            <a href="{{ route('posts.public.index') }}" class="btn btn-link mt-3">Back to Posts</a>
        </div>
    </div>
@endsection

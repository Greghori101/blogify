@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-3">{{ $post->title }}</h3>
                <p class="card-text">{{ $post->content }}</p>
                <p class="text-muted small">
                    Status: <strong>{{ ucfirst($post->status) }}</strong> |
                    Source: <strong>{{ $post->source }}</strong>
                </p>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
            </div>
        </div>
    </div>
@endsection

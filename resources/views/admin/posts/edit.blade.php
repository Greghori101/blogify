@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Edit Post</h4>
                <form method="POST" action="{{ route('posts.update', $post) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" value="{{ $post->title }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft" @selected($post->status == 'draft')>Draft</option>
                            <option value="published" @selected($post->status == 'published')>Published</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

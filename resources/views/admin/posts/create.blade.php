@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-4">Create New Post</h4>
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea name="content" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Source</label>
                        <input name="source" type="text" class="form-control" value="local" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">External ID</label>
                        <input name="external_id" type="text" class="form-control" value="{{ uniqid('manual_') }}"
                            readonly>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

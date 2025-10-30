@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <div>
                <form method="POST" action="{{ route('import.source', 'jsonplaceholder') }}" class="d-inline">@csrf
                    <button class="btn btn-primary btn-sm">Import JSONPlaceholder</button>
                </form>
                <form method="POST" action="{{ route('import.source', 'fakestore') }}" class="d-inline">@csrf
                    <button class="btn btn-success btn-sm">Import FakeStore</button>
                </form>
            </div>
            <a href="{{ route('posts.create') }}" class="btn btn-dark btn-sm">Create Post</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Source</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><span
                                        class="badge bg-{{ $post->status == 'published' ? 'success' : 'secondary' }}">{{ ucfirst($post->status) }}</span>
                                </td>
                                <td>{{ $post->source }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}"
                                        class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form action="{{ route('posts.toggle', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-warning">Toggle</button>
                                    </form>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">@csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">No posts found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

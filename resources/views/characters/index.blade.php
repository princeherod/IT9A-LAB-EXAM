<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Dictionary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h1 class="mb-4 text-center">Character Dictionary</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Characters</h5>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createModal">
                Create character
            </button>
        </div>

        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                @forelse($characters as $char)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $char->name }}</strong><br>
                                <small class="text-muted">
                                    {{ $char->power ?? 'No power' }} • {{ $char->universe ?? 'Unknown universe' }}
                                </small>
                            </div>
                            <div class="btn-group">
                                <a href="{{ route('characters.edit', $char) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('characters.destroy', $char) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this character?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted py-4">
                        No characters yet. Create one!
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Character</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('characters.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="power" class="form-label">Power</label>
                        <input type="text" name="power" id="power" class="form-control @error('power') is-invalid @enderror" value="{{ old('power') }}">
                        @error('power')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="universe" class="form-label">Universe</label>
                        <input type="text" name="universe" id="universe" class="form-control @error('universe') is-invalid @enderror" value="{{ old('universe') }}">
                        @error('universe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Character</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
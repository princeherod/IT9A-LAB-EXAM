<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Character</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm border-danger" style="max-width: 500px; margin: auto;">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0">Delete Character</h5>
        </div>
        <div class="card-body">
            <p class="mb-1">Are you sure you want to delete this character?</p>
            <ul class="list-unstyled mt-3 mb-4">
                <li><strong>Name:</strong> {{ $character->name }}</li>
                <li><strong>Power:</strong> {{ $character->power ?? 'No power' }}</li>
                <li><strong>Universe:</strong> {{ $character->universe ?? 'Unknown universe' }}</li>
            </ul>

            <form action="{{ route('characters.destroy', $character->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <a href="{{ route('characters.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
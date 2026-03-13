<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Dictionary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            background: #fff;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            color: #1a1a1a;
        }

        /* Top navbar */
        .top-nav {
            background: #f9f9f8;
            border-bottom: 1px solid #e5e5e5;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            color: #1a1a1a;
        }

        /* Main content */
        .main {
            max-width: 900px;
            margin: 48px auto;
            padding: 0 24px;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #1a1a1a;
        }

        /* Create button */
        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #d1d1d1;
            background: #fff;
            color: #1a1a1a;
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background 0.15s;
        }
        .btn-create:hover { background: #f5f5f5; color: #1a1a1a; }

        /* Character list */
        .char-list {
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            overflow: hidden;
        }

        .char-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 1px solid #efefef;
            background: #fff;
        }
        .char-item:last-child { border-bottom: none; }

        .char-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #1a1a1a;
        }

        .char-meta {
            font-size: 13px;
            color: #555;
            line-height: 1.6;
        }

        /* Actions dropdown */
        .dropdown-toggle {
            border: 1px solid #d1d1d1;
            background: #fff;
            color: #1a1a1a;
            font-size: 13px;
            padding: 5px 12px;
            border-radius: 6px;
            cursor: pointer;
        }
        .dropdown-toggle:hover { background: #f5f5f5; }
        .dropdown-toggle::after { margin-left: 6px; }

        .dropdown-item { font-size: 13px; }
        .dropdown-item.text-danger { color: #dc3545 !important; }

        /* Alert */
        .alert { font-size: 14px; margin-bottom: 20px; }

        /* Empty state */
        .empty-state {
            padding: 48px 24px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="top-nav">Character Dictionary</div>

<div class="main">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h1>Characters</h1>

    <a href="{{ route('characters.create') }}" class="btn-create">
        ⊕ Create character
    </a>

    <div class="char-list">
        @forelse($characters as $char)
            <div class="char-item">
                <div>
                    <div class="char-name">{{ $char->name }}</div>
                    <div class="char-meta">
                        {{ $char->power ?? 'No power' }}<br>
                        {{ $char->universe ?? 'Unknown universe' }}
                    </div>
                </div>

                <div class="dropdown">
                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                        Actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('characters.edit', $char->id) }}">Edit</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('characters.confirmDelete', $char->id) }}">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
        @empty
            <div class="empty-state">No characters yet. Create one!</div>
        @endforelse
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
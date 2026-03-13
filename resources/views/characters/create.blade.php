<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Character</title>
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

        .top-nav {
            background: #f9f9f8;
            border-bottom: 1px solid #e5e5e5;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 600;
            color: #1a1a1a;
        }

        .main {
            max-width: 900px;
            margin: 48px auto;
            padding: 0 24px;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 28px;
            color: #1a1a1a;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #1a1a1a;
            margin-bottom: 6px;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #d1d1d1;
            border-radius: 0;
            padding: 8px 0;
            font-size: 14px;
            color: #555;
            background: transparent;
            box-shadow: none !important;
            outline: none !important;
        }
        .form-control:focus {
            border-bottom-color: #1a1a1a;
            background: transparent;
        }
        .form-control::placeholder { color: #aaa; }

        .mb-form {
            margin-bottom: 24px;
        }

        .btn-add {
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
            transition: background 0.15s;
        }
        .btn-add:hover { background: #f5f5f5; }

        .btn-cancel {
            background: none;
            border: none;
            color: #c0392b;
            font-size: 13px;
            padding: 6px 14px;
            cursor: pointer;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-cancel:hover { background: #fff5f5; color: #c0392b; }

        .btn-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
        }

        .invalid-feedback { font-size: 12px; }
    </style>
</head>
<body>

<div class="top-nav">Character Dictionary</div>

<div class="main">
    <h1>Create Character</h1>

    <form action="{{ route('characters.store') }}" method="POST" style="max-width: 940px;">
        @csrf

        <div class="mb-form">
            <label class="form-label">Name</label>
            <input type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                placeholder="Name"
                value="{{ old('name') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-form">
            <label class="form-label">Power</label>
            <input type="text" name="power"
                class="form-control @error('power') is-invalid @enderror"
                placeholder="Power"
                value="{{ old('power') }}">
            @error('power') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-form">
            <label class="form-label">Universe</label>
            <input type="text" name="universe"
                class="form-control @error('universe') is-invalid @enderror"
                placeholder="Universe"
                value="{{ old('universe') }}">
            @error('universe') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="btn-row">
            <button type="submit" class="btn-add">⊕ Add Character</button>
            <a href="{{ route('characters.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
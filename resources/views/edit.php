@extends('characters.index') <!-- or make separate layout -->

@section('content')
<div class="container my-5">
    <h1>Edit Character</h1>

    <form action="{{ route('characters.update', $character) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $character->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Power</label>
            <input type="text" name="power" class="form-control" value="{{ old('power', $character->power) }}">
        </div>

        <div class="mb-3">
            <label>Universe</label>
            <input type="text" name="universe" class="form-control" value="{{ old('universe', $character->universe) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('characters.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
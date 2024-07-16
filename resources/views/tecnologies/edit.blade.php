@extends('layouts.layout')

@section('content')

    <form method="POST" action="{{ route('tecnology.update', $tecnology->id) }}" class="p-5">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$tecnology->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Icon</label>
            <input type="text" class="form-control" name="description" id="description" value="{{$tecnology->icon}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('tecnology.store') }}" class="p-5">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Icon</label>
            <input type="text" class="form-control" name="icon">
            @error('icon')
            <div>{{$message}}</div>
            @enderror
        </div>
   

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

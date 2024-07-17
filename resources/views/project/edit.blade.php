@extends('layouts.layout')

@section('content')

    <form method="POST" action="{{ route('project.update', $project) }}" class="p-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$project->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" value="{{$project->description}}">
        </div>
        <div class="mb-3">
            <label for="creation_date" class="form-label">Creation date</label>
            <input type="text" class="form-control" name="creation_date" id="creation_date" value="{{$project->creation_date}}">
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">cover_image</div>
            @error('cover_image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

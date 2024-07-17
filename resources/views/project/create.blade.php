@extends('layouts.layout')

@section('content')
    <form method="POST" action="{{ route('project.store') }}" class="p-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
            @error('description')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Creation date</label>
            <input type="text" class="form-control" name="creation_date">
            @error('creation_date')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">cover_image</div>
            @error('cover_image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Type project</label>
            <input type="text" class="form-control" name="type_id" placeholder="inserisci numero per tipo progetto">
            @error('type_id')
            <div>{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

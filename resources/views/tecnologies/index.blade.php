@extends('layouts.layout')

@section('content')
    <h1>Project</h1>

    @foreach ($tecnologie as $tecnologia)
        <h3>Project Name: {{ $tecnologia->name }}</h3>
        <p>Description: {{ $tecnologia->icon }}</p>
        <a href="{{ route('admin.tecnology.show', $tecnologia) }}">{{ $tecnologia->name }}</a>
    @endforeach
@endsection

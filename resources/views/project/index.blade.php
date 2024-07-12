@extends('layouts.layout')

@section('content')
    <h1>Project</h1>

    @foreach ($catalogo as $progetti)
        <h3>Project Name: {{ $progetti->name }}</h3>
        <p>Description: {{ $progetti->description }}</p>
        <p>creation date: {{ $progetti->creation_date }}</p>
        <a href="{{ route('admin.project.show', $progetti) }}">{{ $progetti->name }}</a>
    @endforeach
@endsection

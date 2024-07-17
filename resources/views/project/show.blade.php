@extends('layouts.layout')

@section('content')
    <h2>Single Project</h2>
    <ul>
        <li class="mt-4">Nome progetto: {{ $project['name'] }}</li>
        <li>Descrizione: {{ $project['description'] }}</li>
        <li>Data di creazione: {{ $project['creation_date'] }}</li>
        <li>cover_image:{{$project['cover_image']}}
            <img width="200" height="200" src="{{ asset('storage/' . $project->cover_image)}}" alt="">
        </li>
    </ul>

    <a href="{{ route('admin.project.index') }}" class="btn btn-primary">Torna alla lista dei progetti</a>
    <a href="{{ route('admin.project.edit',$project->id) }}" class="btn btn-primary">Modifica progetto</a>

    <form action="{{ route('admin.project.destroy', $project->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger my-5">Distruggi Progetto </a>
    </form>
@endsection

@extends('layouts.layout')

@section('content')
    <h2>Single tech</h2>
    <ul>
        <li class="mt-4">Nome progetto: {{ $tech['name'] }}</li>
        <li>Descrizione: {{ $tech['icon'] }}</li>
    </ul>

    <a href="{{ route('admin.tecnology.index') }}" class="btn btn-primary">Torna alla lista delle tecnologie usate </a>
    <form action="{{ route('admin.tecnology.destroy', $tech->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger my-5">Distruggi Tecnologia </a>
    </form>
@endsection

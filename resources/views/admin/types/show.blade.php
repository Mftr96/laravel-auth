@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1 class="pb-4">
                    <i class="{{ $type->icon }}"></i> {{ $type->name }}
                </h1>
                
                <h2>tipologia progetto:</h2>
                <ul>
                    <li> {{$type->name }}</a></li>
                </ul>

                <a href="{{ route("admin.types.index") }}" class="btn btn-primary">Torna alla lista tipi di progetto</a>

            </div>
        </div>
    </div>
@endsection
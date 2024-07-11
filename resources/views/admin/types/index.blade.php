@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="pb-4">type List</h1>
            </div>
            <div class="col-md-12">

                <ul>
                    @foreach ($type as $tipo)

                        <li><a href="{{ route("admin.types.show", $tipo) }}">{{ $tipo->name }}</a></li>

                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('title', '404 Not Found')
@section('content')

  <h1>404 | NOT FOUND</h1>

  <p>The resource you requested could not be found.</p>

  {{-- OPTIONAL: Display custom error message --}}
  {{-- {{ $exception->getMessage() }} --}}

@endsection
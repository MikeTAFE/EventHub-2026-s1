@extends('layouts.app')
@section('title', '404 Not Found')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">404 | NOT FOUND</h1>

      <p class="text-gray-600 leading-relaxed">The resource you requested could not be found.</p>

      {{-- OPTIONAL: Display custom error message --}}
      {{-- {{ $exception->getMessage() }} --}}

    </div>
  </section>

@endsection
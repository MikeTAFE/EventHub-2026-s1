@extends('layouts.app')
@section('title', 'Search results')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Search results</h1>

      <p class="text-gray-600 leading-relaxed">
        Showing search results for '{{ $searchTerm }}'.
      </p>

      {{-- Show list of events matching search term --}}
      @include('partials._event_cards', ["events" => $events])

    </div>
  </section>

@endsection
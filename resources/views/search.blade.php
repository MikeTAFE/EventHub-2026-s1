@extends('layouts.app')
@section('title', 'Search results')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">{{ $events->count() }} results for "{{ $searchTerm }}"</h1>

      <div class="max-w-xl mb-5">
        @include("partials._search")
      </div>

      {{-- Show list of events matching search term --}}
      @include('partials._event_cards', ["events" => $events])

    </div>
  </section>

@endsection
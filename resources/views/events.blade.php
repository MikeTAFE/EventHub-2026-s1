@extends('layouts.app')
@section('title', 'View all events')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">All events</h1>

      <p class="text-gray-600 leading-relaxed">
        Here's a listing of all events currently on offer.
      </p>

    </div>
  </section>

  <section class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="h2">Event list</h2>

    @include('partials._event_cards', ["events" => $events])

  </section>

@endsection
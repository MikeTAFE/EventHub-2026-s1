@extends('layouts.app')
@section('title', 'Welcome to EventHub')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Welcome to EventHub</h1>

      <p class="text-gray-600 leading-relaxed">
        EventHub helps people discover and register for exciting events including music festivals, conferences, workshops, and networking opportunities.
      </p>

      <img
        src="{{ asset('images/colourful-lantern-festival.jpg') }}"
        class="max-h-48 w-full object-cover"
        alt="Colourful lanterns">
    </div>
  </section>

  {{-- Categories --}}
  <section class="max-w-7xl mx-auto px-6 py-12">
    <h3 class="h3">Browse by Category</h3>

    {{-- Placeholder for category links --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <a href="#" class="bg-white hover:bg-blue-100 p-6 rounded-xl shadow text-center">
        🎵 Music
      </a>

      <a href="#" class="bg-white hover:bg-blue-100 p-6 rounded-xl shadow text-center">
        💼 Business
      </a>

      <a href="#" class="bg-white hover:bg-blue-100 p-6 rounded-xl shadow text-center">
        🎨 Arts
      </a>

      <a href="#" class="bg-white hover:bg-blue-100 p-6 rounded-xl shadow text-center">
        💻 Technology
      </a>
    </div>
  </section>

  @include('partials._hero')

  <section class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="h2">Upcoming events</h2>

    @if (empty($events))

      <p>No upcoming events to display.</p>

    @else
    
      <ul>
        @foreach ($events as $event)
          <li>{{ $event }}</li>
        @endforeach
      </ul>

    @endif

  </section>

  {{-- Featured Events --}}
  <section class="max-w-7xl mx-auto px-6 pb-16">
    <h3 class="h3">Featured Events</h3>

    <div class="grid md:grid-cols-3 gap-6">

      {{-- Event Card (partial?) --}}
      <div class="bg-white rounded-xl shadow overflow-hidden">
        <img
          src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1200&auto=format&fit=crop"
          alt="Event"
          class="h-48 w-full object-cover"
        >
        <div class="p-5">
          <h4 class="text-xl font-semibold mb-2">
            Summer Music Festival
          </h4>

          <p class="text-gray-600 text-sm mb-4">
            July 20, 2026 • Brisbane
          </p>

          <div class="flex justify-between items-center">
            <span class="font-bold text-indigo-600">
              Free
            </span>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
              Add Event
            </button>
          </div>
        </div>
      </div>

      {{-- Event Card (partial?) --}}
      <div class="bg-white rounded-xl shadow overflow-hidden">
        <img
          src="https://images.unsplash.com/photo-1515169067868-5387ec356754?q=80&w=1200&auto=format&fit=crop"
          alt="Event"
          class="h-48 w-full object-cover"
        >
        <div class="p-5">
          <h4 class="text-xl font-semibold mb-2">
            Startup Networking Night
          </h4>

          <p class="text-gray-600 text-sm mb-4">
            August 5, 2026 • Sydney
          </p>

          <div class="flex justify-between items-center">
            <span class="font-bold text-indigo-600">
              $25
            </span>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
              Add Event
            </button>
          </div>
        </div>
      </div>

      {{-- Event Card (partial?) --}}
      <div class="bg-white rounded-xl shadow overflow-hidden">
        <img
          src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop"
          alt="Event"
          class="h-48 w-full object-cover"
        >
        <div class="p-5">
          <h4 class="text-xl font-semibold mb-2">
            Tech Conference 2026
          </h4>

          <p class="text-gray-600 text-sm mb-4">
            September 10, 2026 • Melbourne
          </p>

          <div class="flex justify-between items-center">
            <span class="font-bold text-indigo-600">
              $99
            </span>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
              Add Event
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
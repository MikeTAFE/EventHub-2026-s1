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
      
      @include('partials._hero')

    </div>
  </section>

  {{-- Categories --}}
  <section class="max-w-7xl mx-auto px-6 pt-12 pb-6">

    <h3 class="h3">Browse by Category</h3>

    <x-nav-categories />

  </section>

  <section class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="h2">Featured events</h2>

    @include('partials._event_cards', ["events" => $featuredEvents])

  </section>

@endsection
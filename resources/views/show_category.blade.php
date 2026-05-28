@extends('layouts.app')
@section('title', 'Category details')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Category: {{ $category->name }}</h1>

      <p class="text-gray-600 leading-relaxed">
        Here's a listing of all events currently on offer within the {{ $category->name }} category.
      </p>

      @include('partials._event_cards', ["events" => $events])

    </div>
  </section>

@endsection
@extends('layouts.app')
@section('title', 'Search results')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">You have {{ $events->count() }} saved events</h1>

      {{-- Show list of saved events --}}
      @include('partials._event_cards', ["events" => $events])

    </div>
  </section>

@endsection
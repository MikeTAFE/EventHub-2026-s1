@extends('layouts.app')
@section('title', 'Search results')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">You have {{ $events->count() }} saved events</h1>

      {{-- Show list of saved events --}}
      @include('partials._event_cards', ["events" => $events])

      {{-- CTA buttons if events have been saved --}}
      @if ($events->count() > 0)

        <div class="cta-buttons my-6">
          <a href="{{ route("events.checkout_form") }}" class="inline-block text-lg bg-indigo-600 text-white px-5 py-3 rounded-lg hover:bg-indigo-700">
            Register for events
          </a>
        </div>
        
      @endif

    </div>
  </section>

@endsection
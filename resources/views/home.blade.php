@extends('layouts.app')
@section('title', 'Welcome to EventHub')
@section('content')

  @include('partials._hero')

  <h1 class="text-4xl text-heading">Home EventHub</h1>

  <p>Welcome to EventHub, where all your event needs are met!</p>

  <h2 class="text-4xl">Upcoming events</h2>

  @if (empty($events))

    <p>No upcoming events to display.</p>

  @else
  
    <ul>
      @foreach ($events as $event)
        <li>{{ $event }}</li>
      @endforeach
    </ul>

  @endif

@endsection
@extends('layouts.app')
@section('title', 'Finalise registration')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Finalise registration</h1>

      {{-- Display errors --}}
      @if ($errors->any())
        <div class="bg-red-100 text-red-800 my-3">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="/checkout" method="post">
        @csrf

        <div>
          <label for="customer_name">Your name:</label>
          <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}">
        </div>

        <div>
          <label for="customer_email">Your email:</label>
          <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}">
        </div>

        <p>You are registering for {{ $savedEvents->count() }} events.</p>

        <button type="submit">Complete registration</button>
      </form>

    </div>
  </section>

@endsection
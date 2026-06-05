@extends('layouts.app')
@section('title', 'Finalise registration')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Finalise registration</h1>

      <p class="flex align-middle items-start gap-3 rounded-md border-l-4 border-blue-500 bg-blue-50 p-4 text-blue-800">You are registering for {{ $savedEvents->count() }} events.</p>

      {{-- Display errors --}}
      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 my-6 px-4 py-3 rounded">
          <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="/checkout" method="post" class="max-w-md space-y-5">
        @csrf

        <div>
          <label for="customer_name" class="mb-1 block font-medium text-gray-700">Your name:</label>
          <input
            type="text" id="customer_name" name="customer_name"
            value="{{ old('customer_name') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('customer_name')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="customer_email" class="mb-1 block font-medium text-gray-700">Your email:</label>
          <input
            type="email" id="customer_email" name="customer_email"
            value="{{ old('customer_email') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('customer_email')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-white transition hover:bg-indigo-700">Complete registration</button>
      </form>

    </div>
  </section>

@endsection
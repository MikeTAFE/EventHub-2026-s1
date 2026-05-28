@extends('layouts.app')
@section('title', 'Event details')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Event details</h1>

      <table class="table-auto border-collapse border border-slate-400">
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Name:</th>
          <td class="border border-slate-300 p-2">{{ $event->name }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Location:</th>
          <td class="border border-slate-300 p-2">{{ $event->location }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Price:</th>
          <td class="border border-slate-300 p-2">{{ $event->price_formatted }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Date:</th>
          <td class="border border-slate-300 p-2">{{ $event->event_date?->format('M j, Y') ?? "---" }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Category:</th>
          <td class="border border-slate-300 p-2">{{ $event->category->name }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Featured:</th>
          <td class="border border-slate-300 p-2">{{ $event->featured ? "Yes" : "No" }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Description:</th>
          <td class="border border-slate-300 p-2">{{ $event->description }}</td>
        </tr>
        <tr class="text-left">
          <th class="bg-slate-100 border border-slate-300 p-2">Image:</th>
          <td class="border border-slate-300 p-2">
            <img
              src="{{ $event->image_url }}"
              alt="Cover image for {{ $event->name }}"
              class="h-48 w-auto object-contain"
            >
          </td>
        </tr>
      </table>

    </div>
  </section>

@endsection
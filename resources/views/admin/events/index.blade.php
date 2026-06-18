@extends('layouts.app')
@section('title', 'Manage events')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Manage events</h1>

      <a href="{{ route("admin.events.create") }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
        Add new event
      </a>

      @if ($events->count() === 0)

        <div class="flex align-middle items-start gap-3 rounded-md border-l-4 border-blue-500 bg-blue-50 p-4 text-blue-800" role="alert">
          <span>No events to display.</span>
        </div>

      @else

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Location</th>
              <th>Price</th>
              <th>Date</th>
              <th>Featured</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($events as $event)
              
            <tr>
              <td>{{ $event->id }}</td>
              <td>
                <img
                  src="{{ $event->image_url }}"
                  alt=""
                  class="h-16 object-cover"
                >
              </td>
              <td>{{ $event->name }}</td>
              <td>{{ $event->location }}</td>
              <td>{{ $event->price_formatted }}</td>
              <td>{{ $event->event_date?->format('M j, Y') ?? "" }}</td>
              <td>{{ $event->featured ? "✔" : "" }}</td>
              <td>{{ $event->category->name }}</td>
              <td>
                {{-- Edit link/button --}}
                <a href="{{ route("admin.events.edit", $event->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                  Edit
                </a>
                {{-- Delete link/button --}}
                <form method="post" action="{{ route("admin.events.destroy", $event->id) }}" class="inline-block" onsubmit="return confirm('Are you sure?')">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 cursor-pointer">
                    Delete
                  </button>
                </form>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>

      @endif

    </div>
  </section>

@endsection
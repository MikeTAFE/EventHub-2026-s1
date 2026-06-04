@if ($events->count() === 0)

  <div class="flex align-middle items-start gap-3 rounded-md border-l-4 border-blue-500 bg-blue-50 p-4 text-blue-800" role="alert">
    <svg class="h-5 w-5 shrink-0 text-blue-500" fill="#2b7fff" width="20" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 416.979 416.979"><path d="M356.004,61.156c-81.37-81.47-213.377-81.551-294.848-0.182c-81.47,81.371-81.552,213.379-0.181,294.85 c81.369,81.47,213.378,81.551,294.849,0.181C437.293,274.636,437.375,142.626,356.004,61.156z M237.6,340.786 c0,3.217-2.607,5.822-5.822,5.822h-46.576c-3.215,0-5.822-2.605-5.822-5.822V167.885c0-3.217,2.607-5.822,5.822-5.822h46.576 c3.215,0,5.822,2.604,5.822,5.822V340.786z M208.49,137.901c-18.618,0-33.766-15.146-33.766-33.765 c0-18.617,15.147-33.766,33.766-33.766c18.619,0,33.766,15.148,33.766,33.766C242.256,122.755,227.107,137.901,208.49,137.901z"></path></svg>
    <span>No events to display.</span>
  </div>

@else

  <div class="grid md:grid-cols-3 gap-6">
    @foreach ($events as $event)
      {{-- Event Card --}}
      <div class="bg-white rounded-xl shadow overflow-hidden">
        <img
          src="{{ $event->image_url }}"
          alt="Event"
          class="h-48 w-full object-cover"
        >
        <div class="p-5">
          <h4 class="text-xl font-semibold mb-2">
            {{ $event->name }}
          </h4>

          <p class="text-gray-600 text-sm mb-4">
            {{ $event->event_date?->format('M j, Y') ?? "---" }} • {{ $event->location }}
          </p>

          <div class="flex justify-between items-center">
            <span class="font-bold text-indigo-600">
              {{ $event->price_formatted }}
            </span>

            @if ($event->is_saved)
              <form method="post" action="{{ route("events.unsave", $event->id) }}" class="flex gap-1">
                @csrf
                <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 cursor-pointer">
                  Unsave
                </button>

                <a href="{{ route("events.show", $event->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                  More info
                </a>
              </form>
            @else
              <form method="post" action="{{ route("events.save", $event->id) }}" class="flex gap-1">
                @csrf
                <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded-lg hover:bg-amber-700 cursor-pointer">
                  Save
                </button>

                <a href="{{ route("events.show", $event->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                  More info
                </a>
              </form>
            @endif
          </div>
        </div>
      </div>
    @endforeach
    </div>

@endif
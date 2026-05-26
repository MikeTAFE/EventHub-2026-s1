@if ($events->count() === 0)

  <p>No events to display.</p>

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
            July 20, 2026 • Brisbane
          </p>

          <div class="flex justify-between items-center">
            <span class="font-bold text-indigo-600">
              Free
            </span>

            <a href="{{ route("events.show", $event->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
              More info
            </a>
          </div>
        </div>
      </div>
    @endforeach
    </div>

@endif
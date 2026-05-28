<form action="{{ route("events.search") }}" method="GET" class="max-w-xl mx-auto flex gap-2">
  <input
    type="search"
    name="query"
    value="{{ request("query") }}"
    aria-label="Search keyword"
    placeholder="Search events..."
    class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
  >

  <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
    Search
  </button>
</form>
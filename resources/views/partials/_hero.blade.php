<!-- Hero -->
<section class="bg-white">
  <div class="max-w-7xl mx-auto px-6 py-16 text-center">
    <h2 class="text-4xl font-bold mb-4">
      Discover Amazing Events
    </h2>

    <p class="text-gray-600 mb-8">
      Join thousands of people at the best local gatherings!
    </p>

    <!-- Search -->
    <form action="/search" method="GET" class="max-w-xl mx-auto flex gap-2">
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
  </div>
</section>
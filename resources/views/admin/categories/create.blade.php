@extends('layouts.app')
@section('title', 'Add new category')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Add new category</h1>

      <form action="{{ route("admin.categories.store") }}" method="post">
        @csrf

        <div>
          <label for="name" class="mb-1 block font-medium text-gray-700">Name:</label>
          <input
            type="text" id="name" name="name" value="{{ old('name') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('name')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-3 text-white transition hover:bg-indigo-700">Save</button>
          <a href="{{ route("admin.categories.index") }}" class="rounded-lg bg-gray-500 px-4 py-3 text-white transition hover:bg-gray-700">Cancel</a>
        </div>
      </form>

    </div>
  </section>

@endsection
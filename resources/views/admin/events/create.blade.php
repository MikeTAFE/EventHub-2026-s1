@extends('layouts.app')
@section('title', 'Add new event')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Add new event</h1>

      <form action="{{ route("admin.events.store") }}" method="post" enctype="multipart/form-data">
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
          <label for="location" class="mb-1 block font-medium text-gray-700">Location:</label>
          <input
            type="text" id="location" name="location" value="{{ old('location') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('location')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="price" class="mb-1 block font-medium text-gray-700">Price:</label>
          <input
            type="number" step="0.01" id="price" name="price" value="{{ old('price') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('price')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="event_date" class="mb-1 block font-medium text-gray-700">Event date:</label>
          <input
            type="date" id="event_date" name="event_date" value="{{ old('event_date') }}"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('event_date')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="image" class="mb-1 block font-medium text-gray-700">Image:</label>
          <input
            type="file" id="image" name="image"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('image')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="featured" class="mb-1 block font-medium text-gray-700">Featured:</label>
          <input
            type="checkbox" id="featured" name="featured" @checked(old('featured'))
            value="1"
            class="rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
          @error('featured')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="category_id" class="mb-1 block font-medium text-gray-700">Category:</label>
          <select id="category_id" name="category_id" class="flex gap-4 my-3">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <label for="description" class="mb-1 block font-medium text-gray-700">Description:</label>
          <textarea
            id="description" name="description" rows="6"
            class="w-full rounded-lg border border-slate-300 px-3 py-2 transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20"
          >{{ old('description') }}</textarea>
          @error('description')
            <div class="text-red-700 italic">{{ $message }}</div>
          @enderror
        </div>

        <div>
          <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-3 text-white transition hover:bg-indigo-700">Save</button>
          <a href="{{ route("admin.events.index") }}" class="rounded-lg bg-gray-500 px-4 py-3 text-white transition hover:bg-gray-700">Cancel</a>
        </div>
      </form>

    </div>
  </section>

@endsection
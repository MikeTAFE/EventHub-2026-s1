@extends('layouts.app')
@section('title', 'Manage categories')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Manage categories</h1>

      <a href="{{ route("admin.categories.create") }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
        Add new category
      </a>

      @if ($categories->count() === 0)

        <div class="flex align-middle items-start gap-3 rounded-md border-l-4 border-blue-500 bg-blue-50 p-4 text-blue-800" role="alert">
          <span>No categories to display.</span>
        </div>

      @else

        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>
                {{-- Edit link/button --}}
                <a href="{{ route("admin.categories.edit", $category->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                  Edit
                </a>
                {{-- Delete link/button --}}
                <form method="post" action="{{ route("admin.categories.destroy", $category->id) }}" class="inline-block" onsubmit="return confirm('Are you sure?')">
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
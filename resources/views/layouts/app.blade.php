<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EventHub')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- <link rel="stylesheet" href="css/test.css"> --}}
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased">
  
    <!-- Header -->
    <header class="bg-indigo-600 text-white shadow">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route("home") }}"><h1 class="text-2xl font-bold">EventHub</h1></a>

        <nav class="space-x-6">
          <a href="{{ route("home") }}" class="hover:text-indigo-200">Home</a>
          <a href="{{ route("about") }}" class="hover:text-indigo-200">About</a>
          <a href="{{ route("events.index") }}" class="hover:text-indigo-200">Events</a>
          <a href="{{ route("events.saved") }}" class="hover:text-indigo-200">My events</a>
          <a href="{{ route("contact") }}" class="hover:text-indigo-200">Contact</a>
        </nav>
      </div>
    </header>
    {{-- @include('layouts.navigation') --}}
    {{-- @isset($header)
      <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endisset --}}

    @include('partials._flash')

    <main>
      @yield('content')
      {{-- {{ $slot }} --}}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
      <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center">
        <p>&copy;{{ date('Y') }} EventHub - Australian Event Listings</p>

        <div class="space-x-4 mt-4 md:mt-0">
          <a href="{{ route("about") }}" class="hover:text-white">About</a>
          <a href="{{ route("contact") }}" class="hover:text-white">Contact</a>
          <a href="{{ route("privacy") }}" class="hover:text-white">Privacy</a>
        </div>
      </div>
    </footer>
</body>
</html>
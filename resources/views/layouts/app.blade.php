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

        @auth
          {{-- User is logged in - show dashboard/profile/logout navigation --}}
          {{-- @include('layouts.navigation') --}}
          <nav class="flex items-center gap-6">
            
            {{-- Dashboard link --}}
            <a href="{{ route("dashboard") }}" class="hover:text-indigo-200">Dashboard</a>

            {{-- Profile/logout dropdown --}}
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                  <div>{{ Auth::user()->name }}</div>
                  <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </button>
              </x-slot>

              <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                  {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <x-dropdown-link :href="route('logout')"
                      onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                  </x-dropdown-link>
                </form>
              </x-slot>
            </x-dropdown>
          </nav>
        @else
          {{-- User is NOT logged in --}}
          <nav class="space-x-6">
            <a href="{{ route("login") }}" class="hover:text-indigo-200">Login</a>
            <a href="{{ route("register") }}" class="hover:text-indigo-200">Register</a>
          </nav>
        @endauth
      </div>
    </header>

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
      {{ $slot ?? '' }}
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
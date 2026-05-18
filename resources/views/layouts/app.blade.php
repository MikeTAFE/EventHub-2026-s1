<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EventHub')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  {{-- <link rel="stylesheet" href="css/test.css"> --}}
</head>
<body class="bg-gray-100 text-gray-800">
  
    <!-- Header -->
    <header class="bg-indigo-600 text-white shadow">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/"><h1 class="text-2xl font-bold">EventHub</h1></a>

        <nav class="space-x-6">
          <a href="/" class="hover:text-indigo-200">Home</a>
          <a href="/about" class="hover:text-indigo-200">About</a>
          <a href="#" class="hover:text-indigo-200">Categories</a>
          <a href="#" class="hover:text-indigo-200">My Events</a>
          <a href="#" class="hover:text-indigo-200">Contact</a>
        </nav>
      </div>
    </header>

    <main>
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
      <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center">
        <p>&copy;{{ date('Y') }} EventHub - Australian Event Listings</p>

        <div class="space-x-4 mt-4 md:mt-0">
          <a href="#" class="hover:text-white">About</a>
          <a href="#" class="hover:text-white">Contact</a>
          <a href="#" class="hover:text-white">Privacy</a>
        </div>
      </div>
    </footer>
</body>
</html>
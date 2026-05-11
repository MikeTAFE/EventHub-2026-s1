<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EventHub')</title>
</head>
<body>
  <header>
    <nav>
      <a href="/">Home</a>
      <a href="/about">About us</a>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p>&copy;{{ date('Y') }} EventHub - Australian Event Listings</p>
  </footer>
</body>
</html>
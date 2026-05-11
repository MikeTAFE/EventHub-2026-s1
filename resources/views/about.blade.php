<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - EventHub</title>
</head>
<body>
  <h1>About EventHub</h1>

  <p>Welcome, {{ $username }}! Here is some information about EventHub...</p>
  
  <p>Here is some maths: 2 + 3 = {{2 + 3}}</p>

  {!! $rawHtml !!}

  @if ($username === 'Kim')
    <p>Secret message, just for Kim! <code>WW91J3JlIGRvaW5nIGdyZWF0IQ==</code></p>
  @else
    <p>NO SECRET MESSAGE FOR YOU!  ⛔</p>
  @endif

</body>
</html>
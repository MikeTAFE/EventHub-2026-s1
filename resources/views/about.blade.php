@extends('layouts.app')
@section('title', 'About EventHub')
@section('content')

  <h1>About EventHub</h1>

  <p>Welcome, {{ $username }}! Here is some information about EventHub...</p>
  
  <p>Here is some maths: 2 + 3 = {{2 + 3}}</p>

  {!! $rawHtml !!}

  @if ($username === 'Kim')
    <p>Secret message, just for Kim! <code>WW91J3JlIGRvaW5nIGdyZWF0IQ==</code></p>
  @else
    <p>NO SECRET MESSAGE FOR YOU!  ⛔</p>
  @endif

@endsection
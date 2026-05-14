@extends('layouts.app')
@section('title', 'Event details')
@section('content')

  <h1 class="text-4xl text-heading">Event details</h1>

  <table>
    <tr>
      <th>Name:</th>
      <td>{{ $event["name"] }}</td>
    </tr>
    <tr>
      <th>City:</th>
      <td>{{ $event["city"] }}</td>
    </tr>
  </table>

@endsection
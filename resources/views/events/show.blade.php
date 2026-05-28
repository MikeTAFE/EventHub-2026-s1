@extends('layouts.app')
@section('title', 'Event details')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Event details</h1>

      <table class="table-auto border-collapse border border-slate-400">
        <tr>
          <th>Name:</th>
          <td>{{ $event["name"] }}</td>
        </tr>
        <tr>
          <th>City:</th>
          <td>{{ $event["city"] }}</td>
        </tr>
      </table>

    </div>
  </section>

@endsection
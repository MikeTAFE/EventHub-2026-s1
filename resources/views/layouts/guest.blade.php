@extends('layouts.app')
@section('title', 'Login/Register for EventHub')
@section('content')

<div class="flex flex-col sm:justify-center items-center py-6 sm:py-12 bg-gray-100">
  <div class="w-full sm:max-w-md my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    {{ $slot }}
  </div>
</div>

@endsection
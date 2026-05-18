@extends('layouts.app')
@section('title', 'Contact EventHub')
@section('content')

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

      <h1 class="h1">Contact EventHub</h1>

      <p class="text-gray-600 leading-relaxed">
        We love it when people reach out to us and are always happy to answer questions that you might have. Please use the contact form below to get in contact!
      </p>
    </div>
  </section>

  <section class="bg-white py-16">
    <div class="max-w-3xl mx-auto px-6">
      <h3 class="h3">Contact Us</h3>

      <form class="space-y-4">
        <input
          type="text"
          placeholder="Your Name"
          class="w-full border rounded-lg px-4 py-3"
        >
        <input
          type="email"
          placeholder="Email Address"
          class="w-full border rounded-lg px-4 py-3"
        >
        <textarea
          placeholder="Your Message"
          rows="5"
          class="w-full border rounded-lg px-4 py-3"
        ></textarea>
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
          Send Message
        </button>
      </form>
    </div>
  </section>

@endsection
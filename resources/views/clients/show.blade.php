@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto mt-8">
    <h1 class="text-xl font-bold mb-4">Client card</h1>

    <div class="border p-4 rounded">
        <p><strong>Name:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Car Model:</strong> {{ $client->car_model }}</p>
    </div>

    <a href="{{ route('clients.index') }}"
    class="inline-block mt-4 p-2 bg-gray-600 text-white rounded hover:bg-gray-700">
    Back to the clients list
    </a>
</div>
@endsection

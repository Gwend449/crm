@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Deal card</h1>

        <div class="border p-4 rounded">
            <p><strong>Client Name:</strong> {{ $deal->client?->name }}</p>
            <p><strong>Client's car:</strong> {{ $deal->client?->car_model }}</p>
            <p><strong>Service Name:</strong> {{ $deal->service_name }}</p>
            <p><strong>Comment:</strong> {{ $deal?->comment }}</p>
            <p><strong>Price:</strong> {{ $deal->price }}</p>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($deal->date)->format('d.m.Y') }}</p>
            <p><strong>Status:</strong> {{ $deal?->status }}</p>
        </div>

        <a href="{{ route('deals.index') }}"
            class="inline-block mt-4 p-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Back to the deals list
        </a>
    </div>
@endsection

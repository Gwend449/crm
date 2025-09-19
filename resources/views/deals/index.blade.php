@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Deals</h1>

        <a href="{{ route('deals.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Deal
        </a>

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">id</th>
                    <th class="p-2 border">Client</th>
                    <th class="p-2 border">Service</th>
                    <th class="p-2 border">Car</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Date</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deals as $deal)
                    <tr>
                        <td class="p-2 border">{{ $deal->id }}</td>
                        <td class="p-2 border">{{ $deal->client->name ?? '-' }}</td>
                        <td class="p-2 border">{{ $deal->service_name ?? '-'}}</td>
                        <td class="p-2 border">{{ $deal->client->car_model ?? '-' }}</td>
                        <td class="p-2 border">{{ number_format($deal->price) }}</td>
                        <td class="p-2 border">{{ $deal->date->format('d.m.Y H:i') ?? '-' }}</td>
                        <td class="p-2 border">
                            @php
                                $statusClasses = [
                                    'new' => 'bg-gray-200 text-gray-800',
                                    'pending' => 'bg-yellow-200 text-yellow-800',
                                    'completed' => 'bg-green-200 text-green-800',
                                    'canceled' => 'bg-red-200 text-red-800',
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded text-sm" {{ $statusClasses[$deal->status] ?? 'bg-gray-200' }}>
                                {{ ucfirst($deal->status) }}
                            </span>
                        </td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('deals.show', $deal) }}" class="text-blue-600">View</a>
                            <a href="{{ route('deals.edit', $deal) }}" class="text-yellow-600">Edit</a>

                            <form action="{{ route('deals.destroy', $deal) }}" method="POST"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 p-4">
            {{ $deals->links() }}
        </div>
    </div>
@endsection

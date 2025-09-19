@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Clients</h1>

        <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Client
        </a>

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">id</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Car</th>
                    <th class="p-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td class="p-2 border">{{ $client->id }}</td>
                        <td class="p-2 border">{{ $client->name }}</td>
                        <td class="p-2 border">{{ $client->email }}</td>
                        <td class="p-2 border">{{ $client->car_model }}</td>
                        <td class="p-2 border flex gap-2">
                            <a href="{{ route('clients.show', $client) }}" class="text-blue-600">View</a>
                            <a href="{{ route('clients.edit', $client) }}" class="text-yellow-600">Edit</a>

                            <form action="{{ route('clients.destroy', $client) }}" method="POST"
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
            {{ $clients->links() }}
        </div>
    </div>
@endsection

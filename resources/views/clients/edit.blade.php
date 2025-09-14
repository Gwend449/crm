@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Edit client</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block">Name</label>
                <input value="{{ old('name', $client->name) }}" type="text" name="name" class="w-full border p-2 rounded">
                @error('name') <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block">Email</label>
                <input value="{{ old('email', $client->email) }}" type="email" name="email" class="w-full border p-2 rounded">
                @error('email') <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="name" class="block">Car Model</label>
                <input value="{{ old('car_model', $client->car_model) }}" type="text" name="car_model" class="w-full border p-2 rounded">
                @error('car_model') <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
@endsection

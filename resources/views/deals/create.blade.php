@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Create a deal</h1>

        <form action="{{ route('deals.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="client_id" class="block">Client</label>
                <select name="client_id" id="client_id" required class="mt-1 block w-full rounded border gray-300"
                    onchange="this.form.submit()">
                    <option value="">-- Select Client --</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client_id') <p class="text-red-600">{{ $message }}</p>@enderror
            </div>

            @if(session('selected_client'))
                <div class="block">
                    <label for="" class="block">Client's Car</label>
                    <input type="text" value="{{ session('selected_client')->car_model }}" class="w-full border p-2 rounded">
                </div>
            @endif

            <div>
                <label for="email" class="block">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded">
                @error('email') <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="name" class="block">Car Model</label>
                <input type="text" name="car_model" class="w-full border p-2 rounded">
                @error('car_model') <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
@endsection

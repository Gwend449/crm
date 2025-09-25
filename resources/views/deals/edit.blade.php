@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Edit deal</h1>

        <form action="{{ route('deals.update', $deals->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <livewire:client-selector :selectedClientId="$deals->client_id" />

            <div class="div">
                <label for="service_name" class="block">Service name</label>
                <input type="text" name="service_name" class="w-full border p-2 rounded" value="{{ old('service_name', $deals->service_name) }}">
                @error('client_id')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <label for="comment" class="block">Deal comment</label>
                <textarea id="comment" name="comment" class="w-full border p-2 rounded">{{ old('comment', $deals->comment) }}</textarea>
                @error('comment')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <label for="price" class="block">Price</label>
                <select id="price" name="price" class="w-full border p-2 rounded" value="{{ old('price', $deals->price) }}">
                    <option value="">-- выберите цену --</option>
                    <option value="1000" {{ old('price') == 1000 ? 'selected' : '' }}>1000 $</option>
                    <option value="2000" {{ old('price') == 2000 ? 'selected' : '' }}>2000 $</option>
                    <option value="3000" {{ old('price') == 3000 ? 'selected' : '' }}>3000 $</option>
                    <option value="5000" {{ old('price') == 5000 ? 'selected' : '' }}>5000 $</option>
                </select>
                @error('price')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2">
                <label for="date" class="block">Deal Date</label>
                <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full border p-2 rounded" value="{{ old('date', $deals->date) }}">
                @error('date')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
@endsection
@livewireStyles
@livewireScripts

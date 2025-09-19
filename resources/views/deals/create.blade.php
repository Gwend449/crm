@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-8">
        <h1 class="text-xl font-bold mb-4">Create a deal</h1>

        <form action="{{ route('deals.store') }}" method="POST" class="space-y-4">
            @csrf

            <livewire:client-selector/>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Save
            </button>
        </form>
    </div>
@endsection
@livewireStyles
@livewireScripts


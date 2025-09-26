@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Clients</h1>


        <a href="{{ route('clients.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Add Client
        </a>

        @livewire('client-search')

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700">Клиентов</h3>
                <p class="text-3xl font-bold mt-2">{{ $stats['clients_count'] }}</p>
                <a href="{{ route('clients.create') }}"
                   class="mt-3 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Добавить клиента
                </a>
            </div>

            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700">Сделок</h3>
                <p class="text-3xl font-bold mt-2">{{ $stats['deals_count'] }}</p>
                <a href="{{ route('deals.create') }}"
                   class="mt-3 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    + Добавить сделку
                </a>
            </div>

            <div class="p-6 bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Сделки по статусам</h3>
                <ul class="space-y-1">
                    @foreach($stats['deals_by_status'] as $status => $count)
                        <li class="flex justify-between">
                            <span class="capitalize">{{ $status }}</span>
                            <span class="font-semibold">{{ $count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

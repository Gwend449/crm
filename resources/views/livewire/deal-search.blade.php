<div class="max-w-6xl mx-auto mt-8">

    <div class="mt-6 mb-3 flex flex-wrap items-center gap-2">
        <input type="text" wire:model.debounce.500ms="search"
               class="px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Поиск по имени клиента">

        <select wire:model="status"
                class="px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Все статусы</option>
            <option value="new">Новые</option>
            <option value="pending">В ожидании</option>
            <option value="completed">Завершённые</option>
            <option value="canceled">Отменённые</option>
        </select>

        <button type="button" wire:click="resetFilters"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
            Сбросить
        </button>
    </div>

    <table class="w-full mt-6 border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border cursor-pointer select-none" wire:click="sortBy('id')">
                    ID
                    @if ($sortField === 'id')
                        {{ $sortDirection === 'asc' ? '▲' : '▼' }}
                    @endif
                </th>
                <th class="p-2 border cursor-pointer select-none" wire:click="sortBy('client_name')">
                    Client
                    @if ($sortField === 'client_name')
                        {{ $sortDirection === 'asc' ? '▲' : '▼' }}
                    @endif
                </th>
                <th class="p-2 border">Service</th>
                <th class="p-2 border">Car</th>
                <th class="p-2 border cursor-pointer select-none" wire:click="sortBy('price')">
                    Price
                    @if ($sortField === 'price')
                        {{ $sortDirection === 'asc' ? '▲' : '▼' }}
                    @endif
                </th>
                <th class="p-2 border cursor-pointer select-none" wire:click="sortBy('date')">
                    Date
                    @if ($sortField === 'date')
                        {{ $sortDirection === 'asc' ? '▲' : '▼' }}
                    @endif
                </th>
                <th class="p-2 border cursor-pointer select-none" wire:click="sortBy('status')">
                    Status
                    @if ($sortField === 'status')
                        {{ $sortDirection === 'asc' ? '▲' : '▼' }}
                    @endif
                </th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deals as $deal)
                <tr>
                    <td class="p-2 border">{{ $deal->id }}</td>
                    <td class="p-2 border">{{ $deal->client->name ?? '-' }}</td>
                    <td class="p-2 border">{{ $deal->service_name ?? '-' }}</td>
                    <td class="p-2 border">{{ $deal->client->car_model ?? '-' }}</td>
                    <td class="p-2 border">{{ number_format($deal->price) }}</td>
                    <td class="p-2 border">{{ $deal->date?->format('d.m.Y H:i') ?? '-' }}</td>
                    <td class="p-2 border">
                        @php
                            $statusClasses = [
                                'new' => 'bg-gray-200 text-gray-800',
                                'pending' => 'bg-yellow-200 text-yellow-800',
                                'completed' => 'bg-green-200 text-green-800',
                                'canceled' => 'bg-red-200 text-red-800',
                            ];
                        @endphp
                        <span class="px-2 py-1 rounded text-sm {{ $statusClasses[$deal->status] ?? 'bg-gray-200' }}">
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
            @empty
                <tr>
                    <td colspan="8" class="text-center p-4 text-gray-500">
                        Сделок не найдено
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- пагинация -->
    <div class="mt-4 p-4">
        {{ $deals->links() }}
    </div>
</div>

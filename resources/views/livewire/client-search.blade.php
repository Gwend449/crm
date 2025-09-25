<div>
    <form class="mt-6 mb-3 flex flex-wrap items-center gap-2">

        <input class="px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="name"
            placeholder="Поиск по имени" wire:model.live.debounce.500ms="search">

        <select wire:model="sort" class="px-3 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Сортировка</option>
            <option value="asc">А-Я</option>
            <option value="desc">Я-А</option>
        </select>

        <!-- <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 transition-colors"
            type="submit">Filter</button> -->

        <button type="button" wire:click="resetFilters"
            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
            Reset
        </button>
    </form>

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

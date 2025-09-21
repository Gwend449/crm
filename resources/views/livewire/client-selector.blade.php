<div>
    <div>
        <label for="client_id" class="block">Client</label>
        <select id="client_id" wire:model="selectedClientId" name="client_id" required
            class="w-full border p-2 rounded">
            <option value="">-- Select Client --</option>

            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>
        @error('client_id') <p class="text-red-600">{{ $message }}</p>@enderror

        <div class="mt-2">
            <label for="car_model" class="block">Car Model</label>
            <input type="text" id="car_model" name="car_model" readonly class="w-full border p-2 rounded"
              wire:model="carModel">
            @error('car_model') <p class="text-red-600">{{ $message }}</p>@enderror
        </div>
    </div>
</div>

                 {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

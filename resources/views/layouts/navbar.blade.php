<!-- <nav class="bg-gray-800 text-white p-4 flex gap-4">
    <a href="{{ route('dashboard') }}"class="hover:underline">Dashboard</a>
    <a href="{{ route('clients.index') }}"class="hover:underline">Clients</a>
    <a href="{{ route('deals.index') }}"class="hover:underline">Deals</a>
</nav> -->
<nav class="bg-gray-800 text-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="text-xl font-bold tracking-wide">
            Detailing CRM
        </div>
        <div class="flex gap-6">
            <a href="{{ route('dashboard') }}"
                class="hover:text-yellow-400 {{ request()->routeIs('dashboard') ? 'text-yellow-400 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('clients.index') }}"
                class="hover:text-yellow-400 {{ request()->routeIs('clients.*') ? 'text-yellow-400 font-semibold' : '' }}">
                Clients
            </a>
            <a href="{{ route('deals.index') }}"
                class="hover:text-yellow-400 {{ request()->routeIs('deals.*') ? 'text-yellow-400 font-semibold' : '' }}">
                Deals
            </a>
        </div>
    </div>
</nav>

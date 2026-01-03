<x-layout>

    <button id="openBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
        Add New Hotel
    </button>
    <h1 class="text-2xl font-bold mt-3">Active Hotels</h1>
    @include('managehotel.partials.modal')


    @forelse ($hotels as $hotel)
        <div class="bg-white rounded-lg shadow-sm p-4 space-y-4 mt-5">
            <div class="flex justify-between items-center">
                <div class="flex flex-row gap-4">
                    <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}" class="h-40">
                    <div class="flex flex-col gap-4">
                        <h1 class="text-3xl font-bold">{{ $hotel->hotelname }}</h1>
                        <p>{{ $hotel->description }}</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <form method="POST" action="{{ route('hotels.edit', $hotel) }}">
                        @csrf
                        <button class="text-white bg-green-700 hover:bg-green-900 text-sm p-2 rounded-lg"><i
                                class="bi bi-pencil-fill"></i></button>
                    </form>
                    <form method="POST" action="{{ route('hotels.destroy', $hotel) }}">
                        @csrf
                        <button class="text-white bg-red-700 hover:bg-red-900 text-sm p-2 rounded-lg"><i
                                class="bi bi-trash3-fill"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h1>No hotel found.</h1>
    @endforelse

    <div class="mt-3">
        {{ $hotels->links() }}
    </div>
    @vite('resources/js/hotel.js')
</x-layout>

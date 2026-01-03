<x-layout>
    <h1 class="text-5xl font-bold text-blue-500">Trashed Items</h1>
    @forelse ($hotels as $hotel)
        <div class="bg-white rounded-lg shadow-sm p-4 space-y-4 mt-5">
            <div class="flex justify-between items-center">
                <div class="flex flex-row gap-4">
                    <img src="{{ $hotel->image_url }}" alt="{{ $hotel->hotelname }}" class="h-40">
                    <div class="flex flex-col gap-4">
                        <h1 class="text-3xl font-bold">{{ $hotel->hotelname }}</h1>
                        <p>{{ $hotel->description }}</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <form method="POST" action="{{ route('hotels.restore', $hotel) }}">
                        @csrf
                        <button class="text-white bg-green-700 hover:bg-green-900 text-sm p-2 rounded-lg"><i class="bi bi-recycle"></i></button>
                    </form>
                    <form method="POST" action="{{ route('hotels.force-delete', $hotel) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-white bg-red-700 hover:bg-red-900 text-sm p-2 rounded-lg"><i
                                class="bi bi-trash3-fill"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h1 class="mt-5">No trashed hotel found.</h1>
    @endforelse
</x-layout>

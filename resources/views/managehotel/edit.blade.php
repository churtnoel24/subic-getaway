<x-layout>
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <form action="{{ route('hotels.update', $hotel) }}" method="POST" enctype="multipart/form-data"
            class="mt-4 space-y-4">
            @csrf
            @method('PATCH')

            <!-- Hotel Name -->
            <div>
                <label for="hotelname" class="block text-sm font-medium text-gray-700 mb-1">
                    Hotel Name *
                </label>
                <input type="text" id="hotelname" name="hotelname" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter hotel name" value="{{ $hotel->hotelname }}">
                @error('hotelname')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                    Description *
                </label>
                <textarea id="description" name="description" rows="3" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter hotel description">{{ $hotel->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if ($hotel->image)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Image</label>
                    <img src="{{ $hotel->image_url }}" alt="{{ $hotel->name }}"
                        class="h-40 w-40 object-cover rounded-lg border">
                    <p class="text-sm text-gray-500 mt-1">Current image will be replaced if you upload a new one.</p>
                </div>
            @endif

            <!-- New Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                    New Hotel Image (Leave empty to keep current)
                </label>
                <div class="mt-1 flex items-center">
                    <input type="file" id="image" name="image" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- New Image Preview -->
                <div id="imagePreview" class="mt-2 hidden">
                    <p class="text-sm text-gray-500 mb-2">New Image Preview:</p>
                    <img id="preview" class="max-h-40 rounded-lg border">
                </div>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-blue-900 text-white rounded-lg p-2">Update</button>
        </form>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm mt-5">
            <h1 class="text-xl font-bold">Added Rooms</h1>
            @foreach ($hotel->rooms as $room)
            <img src="{{ $room->image_url }}" alt="roomimg" class="h-40">
            <h1 class="text-m font-bold">{{ $room->roomtype }}, Good for {{ $room->countperson }} person</h1>
            <p>{{ $room->description1 }}</p>
            <p>{{ $room->description2 }}</p>
            <p>{{ $room->description3 }}</p>
            <hr class="mt-3">
            @endforeach
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm mt-5">
        <h1 class="text-xl font-bold">Room Information</h1>
        <form action="/room" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
            @csrf
            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

            <div>
                <label for="roomimage" class="block text-sm font-medium text-gray-700 mb-1">
                    Room Image
                </label>
                <div class="mt-1 flex items-center">
                    <input type="file" id="roomimage" name="roomimage" accept="image/*"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label for="roomtype" class="block text-sm font-medium text-gray-700 mb-1">
                    Room Type and Amount
                </label>
                <div class="mt-1 flex items-center">
                    <input type="text" id="roomtype" name="roomtype" placeholder="Example: Deluxe Room (Php 3,499)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label for="countperson" class="block text-sm font-medium text-gray-700 mb-1">
                    Good for how many person?
                </label>
                <div class="mt-1 flex items-center">
                    <input type="number" id="countperson" name="countperson" placeholder="Example: 2"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label for="description1" class="block text-sm font-medium text-gray-700 mb-1">
                    Description, leave blank if N/A
                </label>
                <div class="mt-1 flex items-center">
                    <textarea type="textarea" id="description1" name="description1" placeholder=""
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <label for="description2" class="block text-sm font-medium text-gray-700 mb-1">
                    Description, leave blank if N/A
                </label>
                <div class="mt-1 flex items-center">
                    <textarea type="textarea" id="description2" name="description2" placeholder=""
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <label for="description3" class="block text-sm font-medium text-gray-700 mb-1">
                    Description, leave blank if N/A
                </label>
                <div class="mt-1 flex items-center">
                    <textarea type="textarea" id="description3" name="description3" placeholder=""
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>

            <button class="bg-blue-900 text-white rounded-lg p-2">Add Room</button>
        </form>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm mt-5">
            <h1 class="text-xl font-bold">Added Features or Amenities</h1>
            @foreach ($hotel->amenities as $amenity)
            <h1 class="text-m font-bold">{{ $amenity->aof }}</h1>
            <p>{{ $amenity->aofdesc }}</p>
            <hr class="mt-3">
            @endforeach
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm mt-5">
        <h1 class="text-xl font-bold">Feature & Amenities Information</h1>
        <form action="/amenities" method="POST" enctype="multipart/form-data" class="mt-4 space-y-4">
            @csrf

            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

            <div>
                <label for="aof" class="block text-sm font-medium text-gray-700 mb-1">
                    Amenity or Feature
                </label>
                <div class="mt-1 flex items-center">
                    <input type="text" id="aof" name="aof" placeholder="Example: Two"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <label for="aofdesc" class="block text-sm font-medium text-gray-700 mb-1">
                    Description, leave blank if N/A
                </label>
                <div class="mt-1 flex items-center">
                    <textarea type="textarea" id="aofdesc" name="aofdesc" placeholder=""
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
            </div>

            <button class="bg-blue-900 text-white rounded-lg p-2">Add Features & Amenities</button>
        </form>
    </div>
</x-layout>

<x-layout>
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-white p-4 flex items-center justify-between rounded-lg shadow-sm">
            <div class="text-2xl font-bold flex flex-col items-center">
                Trashed Hotels
                <i class="bi bi-house-dash-fill text-red-700"></i>
            </div>
            <div>
                {{ $trashedcount }}
            </div>

        </div>
        <div class="bg-white p-4 flex items-center justify-between rounded-lg shadow-sm">
            <div class="text-2xl font-bold flex flex-col items-center">
                Total Hotels
                <i class="bi bi-house-check-fill text-green-700"></i>
            </div>
            <div>
                {{ $hoteltotal }}
            </div>

        </div>
        <div class="bg-white p-4 flex items-center justify-between rounded-lg shadow-sm">
            <div class="text-2xl font-bold flex flex-col items-center">
                Active Hotels
                <i class="bi bi-house-up-fill text-blue-700"></i>
            </div>
            <div>
                {{ $hotels }}
            </div>

        </div>
    </div>
</x-layout>

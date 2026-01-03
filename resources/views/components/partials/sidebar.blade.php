<div x-show="sidebarOpen" x-transition:enter="sidebar-transition" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="sidebar-transition" x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="w-72 bg-white text-[#0091DD] p-4 fixed top-16.25 h-[calc(100vh-65px)] overflow-y-auto z-20 shadow-lg/20">
    <ul class="space-y-2">
        <li><a href="/dashboard"
                class="block py-2 px-4 rounded font-semibold
               {{ request()->is('dashboard') ? 'bg-blue-100 text-blue-700' : 'hover:bg-blue-100' }}"><i
                    class="bi bi-inboxes"></i> Dashboard</a></li>

        <li><a href="/managehotel"
                class="block py-2 px-4 rounded font-semibold
               {{ request()->is('managehotel') ? 'bg-blue-100 text-blue-700' : 'hover:bg-blue-100' }}"><i
                    class="bi bi-inboxes"></i> Manage Hotel</a></li>

        <li><a href="{{ route('hotels.trashed') }}"
                class="block py-2 px-4 rounded font-semibold
               {{ request()->is('hotels/trashed') ? 'bg-blue-100 text-blue-700' : 'hover:bg-blue-100' }}"><i
                    class="bi bi-inboxes"></i> Trashed Hotels</a></li>
    </ul>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'psys') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="min-h-screen bg-blue-50">
    {{-- @auth --}}
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">
        <!-- Navbar - Fixed at top -->
        <nav
            class="flex justify-between items-center py-3 border-b border-white/10 px-10 bg-white sticky top-0 z-30 shadow-xl/10">
            <div class="flex flex-row gap-3 items-center">
                <!-- Hamburger Button -->
                <button @click="sidebarOpen = !sidebarOpen" class="p-1 cursor-pointer">
                    <i class="bi bi-list text-xl"></i>
                </button>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="h-10">
                </a>
                <h1 class="text-2xl font-semibold">Subic Getaway Admin</h1>
            </div>
            <div>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer">Log out</button>
                </form>
            </div>
        </nav>

        <div class="flex">
            <x-partials.sidebar />
            <main :class="sidebarOpen ? 'content-transition ml-0 md:ml-72' : 'content-transition ml-0'"
                class="flex-1 p-10">
                {{ $slot }}
            </main>
        </div>
    </div>
    {{-- @endauth --}}
    <div x-data="{ showTop: false }" x-init="window.addEventListener('scroll', () => {
        showTop = window.scrollY > 300; // show after 300px
    })">
        <button x-show="showTop" @click="window.scrollTo({ top: 0, behavior: 'smooth' })" x-transition
            class="fixed bottom-5 right-5 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700">
            ↑ Top
        </button>
    </div>
    <script>
    window.flashMessages = {
        success: {!! json_encode(Session::get('success')) !!},
        error: {!! json_encode(Session::get('error')) !!},
        info: {!! json_encode(Session::get('info')) !!},
        warning: {!! json_encode(Session::get('warning')) !!},
        errors: {!! json_encode($errors->all()) !!}
    };
</script>
    @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'psys') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/images/logo.png') }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F1F3F4] text-[#1b1b18] flex p-6 items-center lg:justify-center min-h-screen flex-col">
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-700 lg:grow">
        <main class="flex w-full flex-col lg:flex-row  lg:max-w-3xl min-h-112.5 rounded-lg overflow-hidden shadow-lg">
            <div
                class="hidden lg:flex bg-[#1a678b] items-center justify-center w-full lg:w-[384px] shrink-0 overflow-hidden">
                {{-- Laravel Logo --}}
                <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo of shnrims" class="h-40 rounded-lg">

            </div>

            <div class="flex-1 p-6 sm:p-10 lg:p-10 bg-white flex flex-col justify-center">
                <div class="flex flex-col items-center text-center mb-8">
                    <h1 class="text-2xl font-semibold">User Login</h1>
                    <p class="text-[13px] whitespace-nowrap text-gray-700">Admin</p>
                </div>
                <form method="POST" action="/">
                    @csrf
                    <div class="mb-5 text-sm">
                        <input
                            class="px-5 py-2 w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                            type="text" placeholder="Email" name="email"
                            value="{{ old('email', request()->cookie('remember_email')) }}" required>
                            @error('email')
                        <p class="text-sm text-red-500 font-semibold">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-5">
                        <input
                            class="px-5 py-2 w-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300"
                            type="password" placeholder="Password" name="password" required>
                    </div>
                    <input type="checkbox" name="remember_email" id="remember_email"
                        {{ request()->hasCookie('remember_email') ? 'checked' : '' }}>
                    <label for="remember_email" class="text-sm text-gray-500">Remember email</label>


                    <div class="flex justify-center">
                        <button
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-300 w-full">Log
                            In</button>
                    </div>
                    <div class="mt-2 text-sm">Not an admin? <a href="/about" class="text-blue-500">Click here</a></div>
                </form>
            </div>
        </main>
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
</body>

</html>

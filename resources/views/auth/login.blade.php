<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Program Masjid</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="relative min-h-screen">
            <!-- Background -->
            <div class="absolute inset-0">
                <img
                    src="{{ asset('images/background.jpg') }}"
                    alt="Background"
                    class="w-full h-full object-cover"
                />

                <div class="absolute inset-0 bg-black/50"></div>
            </div>

            <!-- Content -->
            <div class="relative flex items-center justify-center min-h-screen">
                <div
                    class="w-full max-w-md bg-teal-500/95 rounded-[35px] shadow-2xl border-4 border-teal-700 p-10"
                >
                    <div class="text-center mb-8">
                        <div
                            class="w-20 h-20 mx-auto rounded-full border-2 border-white flex items-center justify-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-10 h-10 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                        </div>

                        <h1 class="text-white text-2xl font-bold mt-4">
                            Program Masjid
                        </h1>
                    </div>
                    @if ($errors->any())

    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">

        {{ $errors->first() }}

    </div>

@endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4">
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="Username"
                                class="w-full rounded-full border-0 px-4 py-3 focus:ring-2 focus:ring-white"
                            />
                        </div>

                        <div class="mb-6">
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="w-full rounded-full border-0 px-4 py-3 focus:ring-2 focus:ring-white"
                            />
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-white text-teal-700 font-bold py-3 rounded-full hover:bg-gray-100 transition"
                        >
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

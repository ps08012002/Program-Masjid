<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Program Masjid - Login</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased font-sans">
        <div class="relative min-h-screen">
            <div class="absolute inset-0">
                <img
                    src="{{ asset('images/background.jpg') }}"
                    alt="Background Masjid"
                    class="w-full h-full object-cover"
                />
                <div class="absolute inset-0 bg-gradient-to-br from-teal-900/90 via-emerald-900/80 to-black/90"></div>
            </div>

            <div class="relative flex items-center justify-center min-h-screen p-4">
                <div class="w-full max-w-md bg-white/10 backdrop-blur-md rounded-3xl shadow-[0_8px_32px_0_rgba(0,0,0,0.37)] border border-white/20 p-8 sm:p-10">
                    
                    <div class="text-center mb-8">
                        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-tr from-emerald-400 to-teal-600 shadow-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <h1 class="text-white text-3xl font-extrabold tracking-wide drop-shadow-md">
                            Program Masjid
                        </h1>
                        <p class="text-teal-100/80 mt-2 text-sm">Silakan masuk ke akun Anda</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 bg-red-500/20 border border-red-500/50 backdrop-blur-sm text-red-100 px-4 py-3 rounded-xl flex items-center shadow-sm">
                            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="Username"
                                class="w-full bg-white/10 text-white placeholder-teal-100/70 border border-white/20 rounded-xl py-3 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/20 transition-all duration-300"
                                required
                            />
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input
                                type="password"
                                name="password"
                                placeholder="Password"
                                class="w-full bg-white/10 text-white placeholder-teal-100/70 border border-white/20 rounded-xl py-3 pl-12 pr-4 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:bg-white/20 transition-all duration-300"
                                required
                            />
                        </div>

                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white font-bold py-3.5 rounded-xl hover:from-emerald-400 hover:to-teal-400 focus:ring-4 focus:ring-teal-500/50 transform hover:-translate-y-1 transition-all duration-300 shadow-lg mt-4 tracking-wider"
                        >
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
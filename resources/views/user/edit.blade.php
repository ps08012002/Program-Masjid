@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">
    
    <div class="mb-8 border-b border-gray-50 pb-4">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">
            Edit Data User
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Perbarui kredensial login, hak akses sistem, serta penugasan wilayah masjid untuk akun pengguna ini.
        </p>
    </div>

    <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Nama Lengkap
            </label>
            <input type="text"
                   id="name"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   placeholder="Contoh: Muhammad Nafis"
                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('name') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
            >

            @error('name')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Username
            </label>
            <div class="relative">
                <input type="text"
                       id="username"
                       name="username"
                       value="{{ old('username', $user->username) }}"
                       placeholder="Contoh: nafis_admin"
                       class="w-full bg-gray-50/50 border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('username') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 font-medium text-sm">
                    @
                </div>
            </div>

            @error('username')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 tracking-wide mb-1">
                Password Baru
            </label>
            <p class="text-xs text-amber-600 font-medium mb-2 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Biarkan kosong jika Anda tidak ingin mengubah password user.
            </p>
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="••••••••"
                   class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('password') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
            >

            @error('password')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="role" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Hak Akses (Role)
            </label>
            <div class="relative">
                <select id="role"
                        name="role"
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('role') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User (Operator Masjid)</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin (Pusat / Daerah)</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>

            @error('role')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="id_masjid" class="block text-sm font-semibold text-gray-700 tracking-wide mb-2">
                Afiliasi / Tugas Lokasi Masjid
            </label>
            <div class="relative">
                <select id="id_masjid"
                        name="id_masjid"
                        class="w-full bg-gray-50/50 border border-gray-200 rounded-xl px-4 py-3 text-gray-800 appearance-none focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 focus:bg-white transition-all duration-200 @error('id_masjid') border-rose-400 focus:ring-rose-500/10 focus:border-rose-500 @enderror"
                >
                    <option value="">-- Tidak Terikat / Pilih Masjid --</option>
                    @foreach($masjid as $item)
                        <option value="{{ $item->id }}" {{ old('id_masjid', $user->id_masjid) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>

            @error('id_masjid')
                <p class="text-xs font-medium text-rose-600 mt-1.5 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-50">
            <a href="{{ route('user.index') }}"
               class="inline-flex items-center justify-center font-semibold text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 px-5 py-2.5 rounded-xl transition-all duration-200">
                Kembali
            </a>
            
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-teal-600 to-emerald-500 hover:from-teal-500 hover:to-emerald-400 text-white font-semibold text-sm px-6 py-2.5 rounded-xl shadow-md transform hover:-translate-y-0.5 transition-all duration-200 focus:ring-4 focus:ring-teal-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Update Akun
            </button>
        </div>
    </form>
</div>

@endsection
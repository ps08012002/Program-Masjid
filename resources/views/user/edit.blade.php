@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h1 class="text-2xl font-bold mb-6">
        Edit User
    </h1>

    <form action="{{ route('user.update', $user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2">
                Nama
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Username
            </label>

            <input type="text"
                   name="username"
                   value="{{ old('username', $user->username) }}"
                   class="w-full border rounded-lg p-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Password Baru
            </label>

            <input type="password"
                   name="password"
                   class="w-full border rounded-lg p-2">

            <small class="text-gray-500">
                Kosongkan jika tidak ingin mengubah password
            </small>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Role
            </label>

            <select name="role"
                    class="w-full border rounded-lg p-2">

                <option value="user"
                    {{ $user->role == 'user' ? 'selected' : '' }}>
                    User
                </option>

                <option value="admin"
                    {{ $user->role == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>

            </select>

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Masjid
            </label>

            <select name="id_masjid"
                    class="w-full border rounded-lg p-2">

                <option value="">
                    Pilih Masjid
                </option>

                @foreach($masjid as $item)

                    <option value="{{ $item->id }}"
                        {{ $user->id_masjid == $item->id ? 'selected' : '' }}>

                        {{ $item->nama }}

                    </option>

                @endforeach

            </select>

        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Update
        </button>

        <a href="{{ route('user.index') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded-lg">
            Kembali
        </a>

    </form>

</div>

@endsection
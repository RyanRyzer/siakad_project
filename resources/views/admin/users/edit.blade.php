@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit User

            </h1>

            <p class="text-gray-500 mt-1">

                Perbarui informasi akun user.

            </p>

        </div>

        <a
            href="{{ route('admin.users.index') }}"
            class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-lg">

            Kembali

        </a>

    </div>

    @if($errors->any())

    <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-6">

        <ul class="list-disc ml-5">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="bg-white rounded-xl shadow">

        <form
            action="{{ route('admin.users.update',$user) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="p-8 space-y-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Username

                    </label>

                    <input

                        type="text"

                        name="username"

                        value="{{ old('username',$user->username) }}"

                        class="w-full border rounded-lg px-4 py-3"

                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Lengkap

                    </label>

                    <input

                        type="text"

                        name="name"

                        value="{{ old('name',$user->name) }}"

                        class="w-full border rounded-lg px-4 py-3"

                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Email

                    </label>

                    <input

                        type="email"

                        name="email"

                        value="{{ old('email',$user->email) }}"

                        class="w-full border rounded-lg px-4 py-3"

                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Password Baru

                    </label>

                    <input

                        type="password"

                        name="password"

                        class="w-full border rounded-lg px-4 py-3">

                    <small class="text-gray-500">

                        Kosongkan jika password tidak ingin diubah.

                    </small>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Role

                    </label>

                    <select

                        name="role"

                        class="w-full border rounded-lg px-4 py-3">

                        <option value="admin" @selected($user->role=='admin')>Admin</option>

                        <option value="dosen" @selected($user->role=='dosen')>Dosen</option>

                        <option value="mahasiswa" @selected($user->role=='mahasiswa')>Mahasiswa</option>

                    </select>

                </div>
                                <div class="flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                        Update User

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection
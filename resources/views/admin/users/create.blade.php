@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

<div class="bg-white rounded-xl shadow">

<form action="{{ route('admin.users.store') }}" method="POST">

@csrf

<div class="p-8 space-y-6">

<div>

<label>Username</label>

<input
type="text"
name="username"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label>Nama</label>

<input
type="text"
name="name"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label>Email</label>

<input
type="email"
name="email"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label>Password</label>

<input
type="password"
name="password"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label>Konfirmasi Password</label>

<input
type="password"
name="password_confirmation"
class="w-full border rounded-lg px-4 py-3"
required>

</div>

<div>

<label>Role</label>

<select
name="role"
class="w-full border rounded-lg px-4 py-3">

<option value="admin">

Admin

</option>

<option value="dosen">

Dosen

</option>

<option value="mahasiswa">

Mahasiswa

</option>

</select>

</div>

<div class="flex justify-end gap-3 pt-6">

<a
href="{{ route('admin.users.index') }}"
class="px-6 py-3 bg-gray-300 rounded-lg">

Batal

</a>

<button
class="px-6 py-3 bg-indigo-600 text-white rounded-lg">

Simpan User

</button>

</div>

</div>

</form>

</div>

</div>

@endsection
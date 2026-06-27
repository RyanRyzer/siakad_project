<aside class="w-72 min-h-screen bg-slate-900 text-white">

    <div class="h-16 flex items-center justify-center border-b border-slate-700">

        <h2 class="text-2xl font-bold tracking-wide">

            SIAKAD

        </h2>

    </div>

    <div class="px-4 py-6 space-y-2">

        @if(auth()->user()->role == 'admin')

            <a
                href="{{ route('admin.dashboard') }}"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }}">

                Dashboard

            </a>

            <a
                href="{{ route('admin.users.index') }}"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700 {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600' : '' }}">

                User

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Dosen

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Mahasiswa

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Fakultas

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Program Studi

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Mata Kuliah

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Tahun Akademik

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Jadwal Perkuliahan

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                KRS

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Nilai

            </a>

        @elseif(auth()->user()->role == 'dosen')

            <a
                href="{{ route('dosen.dashboard') }}"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700 {{ request()->routeIs('dosen.dashboard') ? 'bg-indigo-600' : '' }}">

                Dashboard

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Mahasiswa Bimbingan

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Input Nilai

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Jadwal Mengajar

            </a>

        @elseif(auth()->user()->role == 'mahasiswa')

            <a
                href="{{ route('mahasiswa.dashboard') }}"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-indigo-600' : '' }}">

                Dashboard

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Profil

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                KRS

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                KHS

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Jadwal Kuliah

            </a>

            <a
                href="#"
                class="block px-4 py-3 rounded-lg transition hover:bg-slate-700">

                Transkrip Nilai

            </a>

        @endif

    </div>

</aside>
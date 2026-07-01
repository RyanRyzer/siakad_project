<aside class="w-72 min-h-screen bg-slate-900 text-white flex flex-col">

    <div class="h-16 flex items-center justify-center border-b border-slate-700">
        <h2 class="text-2xl font-bold tracking-wide">
            SIAKAD
        </h2>
    </div>

    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-2">

        @if(auth()->user()->role=='admin')

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.users.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                User
            </a>

            <a href="{{ route('admin.fakultas.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.fakultas.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Fakultas
            </a>

            <a href="{{ route('admin.program-studi.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.program-studi.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Program Studi
            </a>

            <a href="{{ route('admin.dosen.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.dosen.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Dosen
            </a>

            <a href="{{ route('admin.mahasiswa.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.mahasiswa.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Mahasiswa
            </a>

            <a href="{{ route('admin.mata-kuliah.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.mata-kuliah.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Mata Kuliah
            </a>

            <a href="{{ route('admin.tahun-akademik.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.tahun-akademik.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Tahun Akademik
            </a>

            <a href="{{ route('admin.jadwal.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('admin.jadwal.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Jadwal
            </a>

        @elseif(auth()->user()->role=='dosen')

            <a href="{{ route('dosen.dashboard') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('dosen.dashboard') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Dashboard
            </a>

            <a href="{{ route('dosen.krs.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('dosen.krs.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Approval KRS
            </a>

            <a href="{{ route('dosen.nilai.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('dosen.nilai.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Input Nilai
            </a>

        @elseif(auth()->user()->role=='mahasiswa')

            <a href="{{ route('mahasiswa.dashboard') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Dashboard
            </a>

            <a href="{{ route('mahasiswa.krs.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('mahasiswa.krs.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                KRS
            </a>

            <a href="{{ route('mahasiswa.khs.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('mahasiswa.khs.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                KHS
            </a>

            <a href="{{ route('mahasiswa.krs.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('mahasiswa.jadwal.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Jadwal Kuliah
            </a>

            <a href="{{ route('mahasiswa.transkrip.index') }}"
               class="block px-4 py-3 rounded-lg transition {{ request()->routeIs('mahasiswa.transkrip.*') ? 'bg-indigo-600' : 'hover:bg-slate-700' }}">
                Transkrip Nilai
            </a>

        @endif

    </div>

    <div class="border-t border-slate-700 p-4">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 transition rounded-lg py-3 font-semibold">

                Logout

            </button>

        </form>

    </div>

</aside>
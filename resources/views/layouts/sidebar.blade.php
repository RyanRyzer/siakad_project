<aside class="w-72 min-h-screen bg-slate-900 text-white">

    <div class="h-16 flex items-center px-6 border-b border-slate-700">

        <h2 class="text-2xl font-bold">

            SIAKAD

        </h2>

    </div>

    <div class="mt-6 px-4 space-y-2">

        @if(auth()->user()->role=='admin')

            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Dashboard

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                User

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Dosen

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Mahasiswa

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Fakultas

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Program Studi

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Mata Kuliah

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Jadwal

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Tahun Akademik

            </a>

        @endif

        @if(auth()->user()->role=='dosen')

            <a href="{{ route('dosen.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Dashboard

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Nilai

            </a>

        @endif

        @if(auth()->user()->role=='mahasiswa')

            <a href="{{ route('mahasiswa.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                Dashboard

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                KRS

            </a>

            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">

                KHS

            </a>

        @endif

    </div>

</aside>
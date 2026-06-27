<nav class="bg-white h-16 shadow flex justify-between items-center px-8">

    <div>

        <h1 class="text-2xl font-bold text-slate-800">

            Sistem Informasi Akademik

        </h1>

    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">

            <h3 class="font-semibold">

                {{ auth()->user()->name }}

            </h3>

            <p class="text-sm text-gray-500 capitalize">

                {{ auth()->user()->role }}

            </p>

        </div>

        <div
            class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">

            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

        </div>

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                class="bg-red-600 hover:bg-red-700 transition text-white px-4 py-2 rounded-lg">

                Logout

            </button>

        </form>

    </div>

</nav>
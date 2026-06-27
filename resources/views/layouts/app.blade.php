<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIAKAD</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-slate-100">

<div class="flex">

    @include('layouts.sidebar')

    <div class="flex-1">

        @include('layouts.navbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>
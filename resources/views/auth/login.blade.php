<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-100 p-4">
    <main class="w-full max-w-sm rounded border border-gray-300 bg-white p-6">
        <h1 class="mb-4 text-2xl font-bold">Login</h1>

        {{-- Isi action dengan route login. --}}
        <form action="#" method="POST" class="flex flex-col gap-4">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="email">Email</label>
                {{-- Isi value dengan old('email'). --}}
                <input id="email" name="email" type="email" value=""
                    required autocomplete="username"
                    class="w-full rounded border border-gray-300 p-2">
            </div>

            <div class="flex flex-col gap-2">
                <label for="password">Password</label>
                <input id="password" name="password" type="password"
                    required autocomplete="current-password"
                    class="w-full rounded border border-gray-300 p-2">
            </div>

            <button type="submit" class="rounded bg-blue-700 px-4 py-2 text-white">Masuk</button>
        </form>
    </main>
</body>
</html>

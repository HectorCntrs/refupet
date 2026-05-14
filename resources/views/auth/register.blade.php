<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#181818]">

    <header class="flex h-20 items-center justify-between border-b border-[#eadfdb] bg-[#fffdfc] px-10">
        <a href="{{ url('/') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424]">
            <span>🐾</span>
            <span>RefuPet</span>
        </a>

        <div class="flex items-center gap-4">
            <a href="{{ route('register') }}"
                class="rounded-2xl bg-[#e66f59] px-6 py-3 text-sm font-extrabold text-white transition hover:bg-[#d85f49]">
                Register
            </a>

            <a href="{{ route('login') }}"
                class="rounded-2xl bg-[#fbfaf9] px-6 py-3 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                Login
            </a>
        </div>
    </header>

    <main class="flex min-h-[calc(100vh-80px)] items-center justify-center px-6 py-12">
        <section class="w-full max-w-[520px] overflow-hidden rounded-2xl bg-white shadow-2xl shadow-stone-900/15">

            <div class="h-[170px] w-full overflow-hidden bg-stone-100">
                <img src="{{ asset('images/perro-login.jpg') }}" alt="Perros de RefuPet"
                    class="h-full w-full object-cover object-[center_2%]">
            </div>

            <div class="px-8 py-9 md:px-10">
                <div class="text-center">
                    <h1 class="text-3xl font-extrabold text-black">
                        Crear cuenta
                    </h1>

                    <p class="mt-3 text-lg text-[#513f3b]">
                        Únete a RefuPet y ayuda a cambiar una vida
                    </p>
                </div>

                <form action="{{ route('register.store') }}" method="POST" class="mt-9 space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Nombre completo
                        </label>

                        <div
                            class="flex h-14 items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">👤</span>

                            <input type="text" id="name" name="name" placeholder="Tu nombre" required
                                class="w-full border-none bg-transparent text-lg text-[#262020] outline-none placeholder:text-slate-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Correo Electrónico
                        </label>

                        <div
                            class="flex h-14 items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">✉</span>

                            <input type="email" id="email" name="email" placeholder="tu@email.com" required
                                class="w-full border-none bg-transparent text-lg text-[#262020] outline-none placeholder:text-slate-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Contraseña
                        </label>

                        <div
                            class="flex h-14 items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">🔒</span>

                            <input type="password" id="password" name="password" placeholder="••••••••" required
                                class="w-full border-none bg-transparent text-lg text-[#262020] outline-none placeholder:text-slate-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Confirmar contraseña
                        </label>

                        <div
                            class="flex h-14 items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">🔐</span>

                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="••••••••" required
                                class="w-full border-none bg-transparent text-lg text-[#262020] outline-none placeholder:text-slate-500 focus:outline-none">
                        </div>
                    </div>

                    <label class="flex cursor-pointer items-start gap-3 text-sm leading-6 text-[#5b4540]">
                        <input type="checkbox" required class="mt-1 h-4 w-4 rounded border-[#deb9b1] accent-[#e66f59]">

                        <span>
                            Acepto los términos y condiciones de RefuPet.
                        </span>
                    </label>

                    <button type="submit"
                        class="h-14 w-full rounded-lg bg-[#e66f59] text-base font-extrabold text-white transition hover:bg-[#d85f49]">
                        Crear cuenta
                    </button>
                </form>

                <div class="my-8 h-px bg-[#eee5e2]"></div>

                <p class="text-center text-base text-[#4f3d39]">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="ml-1 font-extrabold text-[#a93424] hover:underline">
                        Iniciar sesión
                    </a>
                </p>

                @if ($errors->any())
                    <div class="mt-5 rounded-xl border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </section>
    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#181818]">

    <header class="flex h-[74px] items-center justify-between border-b border-[#eadfdb] bg-[#fffdfc] px-8 md:px-12">
        <a href="{{ url('/') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424] no-underline">
            <span class="text-xl">🐾</span>
            <span>RefuPet</span>
        </a>

        <div class="flex items-center gap-4">
            <a href="{{ route('register') }}"
                class="rounded-2xl bg-[#fbfaf9] px-6 py-3 text-sm font-extrabold tracking-wide text-[#a93424] transition hover:bg-[#fff1ee]">
                Register
            </a>

            <a href="{{ route('login') }}"
                class="rounded-2xl bg-[#e66f59] px-6 py-3 text-sm font-extrabold tracking-wide text-white transition hover:bg-[#d85f49]">
                Login
            </a>
        </div>
    </header>

    <main class="flex min-h-[calc(100vh-74px)] items-center justify-center px-5 py-14">
        <section class="w-full max-w-[485px] overflow-hidden rounded-2xl bg-white shadow-2xl shadow-stone-900/10">

            <div class="h-[170px] w-full overflow-hidden bg-stone-100">
                <img src="{{ asset('images/perro-login.jpg') }}" alt="Perros de RefuPet"
                    class="h-full w-full object-cover object-[center_2%]">
            </div>

            <div class="px-8 py-9 md:px-10">
                <h1 class="text-center text-3xl font-extrabold leading-tight text-black">
                    Bienvenido de nuevo
                </h1>

                <p class="mt-3 text-center text-lg text-[#513f3b]">
                    Inicia sesión para continuar ayudando
                </p>

                <form action="#" method="POST" class="mt-9 space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Correo Electrónico
                        </label>

                        <div
                            class="flex h-[54px] items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">✉</span>

                            <input type="email" id="email" name="email" placeholder="tu@email.com" required
                                class="w-full border-0 bg-transparent text-[17px] text-[#262020] outline-none placeholder:text-slate-500 focus:ring-0">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-extrabold tracking-wide text-[#1d1716]">
                            Contraseña
                        </label>

                        <div
                            class="flex h-[54px] items-center rounded-lg border border-[#deb9b1] bg-[#fffdfc] px-4 transition focus-within:border-[#e66f59] focus-within:ring-4 focus-within:ring-[#e66f59]/10">
                            <span class="mr-3 text-xl text-[#8c7a76]">🔒</span>

                            <input type="password" id="password" name="password" placeholder="••••••••" required
                                class="w-full border-0 bg-transparent text-[17px] text-[#262020] outline-none placeholder:text-slate-500 focus:ring-0">
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <label class="flex cursor-pointer items-center gap-2 text-base text-[#5b4540]">
                            <input type="checkbox" name="remember"
                                class="h-4 w-4 rounded border-[#deb9b1] text-[#e66f59] focus:ring-[#e66f59]">
                            <span>Recuérdame</span>
                        </label>

                        <a href="#" class="text-sm font-extrabold text-[#a93424] hover:underline">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <button type="submit"
                        class="h-[54px] w-full rounded-lg bg-[#e66f59] text-base font-extrabold text-white transition hover:bg-[#d85f49]">
                        Iniciar Sesión
                    </button>
                </form>

                <div class="my-8 h-px bg-[#eee5e2]"></div>

                <p class="text-center text-base text-[#4f3d39]">
                    ¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="ml-1 font-extrabold text-[#a93424] hover:underline">
                        Registrarse
                    </a>
                </p>
            </div>
        </section>
    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        <x-user-sidebar />

        <main class="w-full px-5 py-8 lg:ml-[285px] lg:px-11 lg:py-10">

            <header class="mb-10 flex items-center justify-between lg:hidden">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424]">
                    <span>🐾</span>
                    <span>RefuPet</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="rounded-full border border-[#aa3a2a] px-5 py-3 text-sm font-extrabold text-[#a93424]">
                        Logout
                    </button>
                </form>
            </header>

            <section class="mx-auto max-w-4xl">

                <div class="mb-8 flex items-center gap-5">
                    <a href="{{ route('dashboard') }}"
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-white text-3xl text-[#3d302d] shadow-md shadow-stone-900/10 transition hover:bg-[#fff1ee]">
                        ←
                    </a>

                    <div>
                        <h1 class="text-4xl font-black tracking-tight text-[#14100f] md:text-5xl">
                            Editar Perfil
                        </h1>

                        <p class="mt-2 text-lg text-[#4f3f3c]">
                            Actualiza tu información personal y preferencias de seguridad.
                        </p>
                    </div>
                </div>

                <section class="overflow-hidden rounded-2xl border border-[#efe2df] bg-white shadow-sm">

                    @if (session('success'))
                        <div
                            class="mx-8 mt-8 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mx-8 mt-8 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="p-8">

                            {{-- Foto --}}
                            <section
                                class="flex flex-col gap-6 border-b border-[#efe2df] pb-8 md:flex-row md:items-center">
                                <div
                                    class="flex h-28 w-28 shrink-0 items-center justify-center overflow-hidden rounded-full border-4 border-[#f4d4cc] bg-[#fff3ec] text-4xl font-black text-[#a93424] shadow-sm">
                                    @if (!empty(auth()->user()->profile_photo))
                                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                            alt="{{ auth()->user()->name }}" class="h-full w-full object-cover">
                                    @else
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    @endif
                                </div>

                                <div class="flex-1">
                                    <h2 class="text-3xl font-black text-[#14100f]">
                                        Foto de Perfil
                                    </h2>

                                    <p class="mt-2 text-base text-[#5d4a47]">
                                        Sube una nueva foto. Tamaños recomendados: 256x256px. Formatos: JPG, PNG.
                                    </p>

                                    <label
                                        class="mt-5 inline-flex cursor-pointer items-center gap-2 rounded-full border border-[#deb9b1] px-5 py-3 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                        <span>↥</span>
                                        Cambiar Foto

                                        <input type="file" name="profile_photo" accept="image/*" class="hidden">
                                    </label>
                                </div>
                            </section>

                            {{-- Información personal --}}
                            <section class="border-b border-[#efe2df] py-9">
                                <div class="mb-7 flex items-center gap-3">
                                    <span class="text-2xl text-[#a93424]">♙</span>

                                    <h2 class="text-3xl font-black text-[#14100f]">
                                        Información Personal
                                    </h2>
                                </div>

                                <div class="grid gap-6 md:grid-cols-2">
                                    <div>
                                        <label for="name"
                                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                            Nombre Completo
                                        </label>

                                        <input id="name" name="name" type="text"
                                            value="{{ old('name', auth()->user()->name) }}" required
                                            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                    </div>

                                    <div>
                                        <label for="email"
                                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                            Correo Electrónico
                                        </label>

                                        <input id="email" name="email" type="email"
                                            value="{{ old('email', auth()->user()->email) }}" required
                                            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                    </div>

                                    <div>
                                        <label for="phone"
                                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                            Teléfono
                                        </label>

                                        <input id="phone" name="phone" type="text"
                                            value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                            placeholder="+52 000 000 0000"
                                            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="address"
                                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                            Dirección
                                        </label>

                                        <input id="address" name="address" type="text"
                                            value="{{ old('address', auth()->user()->address ?? '') }}"
                                            placeholder="Calle, ciudad, estado"
                                            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                    </div>
                                </div>
                            </section>

                            {{-- Seguridad --}}
                            <section class="pt-9">
                                <div class="mb-3 flex items-center gap-3">
                                    <span class="text-2xl text-[#a93424]">▣</span>

                                    <h2 class="text-3xl font-black text-[#14100f]">
                                        Seguridad
                                    </h2>
                                </div>

                                <p class="mb-7 text-base text-[#5d4a47]">
                                    Actualiza tu contraseña para mantener tu cuenta segura.
                                </p>

                                <div class="grid gap-6">
                                    <div>
                                        <label for="current_password"
                                            class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                            Contraseña Actual
                                        </label>

                                        <input id="current_password" name="current_password" type="password"
                                            placeholder="••••••••"
                                            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                    </div>

                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="password"
                                                class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                                Nueva Contraseña
                                            </label>

                                            <input id="password" name="password" type="password"
                                                placeholder="Mínimo 8 caracteres"
                                                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                        </div>

                                        <div>
                                            <label for="password_confirmation"
                                                class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                                Confirmar Contraseña
                                            </label>

                                            <input id="password_confirmation" name="password_confirmation"
                                                type="password"
                                                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- Footer actions --}}
                        <div
                            class="flex flex-col gap-3 border-t border-[#efe2df] bg-[#fbf8f7] px-8 py-6 sm:flex-row sm:items-center sm:justify-end">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex h-12 items-center justify-center rounded-xl px-6 text-sm font-extrabold text-[#3d302d] transition hover:bg-[#fff1ee]">
                                Cancelar
                            </a>

                            <button type="submit"
                                class="inline-flex h-12 items-center justify-center rounded-xl bg-[#aa3a2a] px-8 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </section>
            </section>
        </main>
    </div>

</body>

</html>
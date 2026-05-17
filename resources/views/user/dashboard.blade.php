<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Dashboard | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        <x-user-sidebar />

        <main class="w-full px-5 py-8 lg:ml-[285px] lg:px-11 lg:py-10">

            {{-- Header móvil --}}
            <header class="mb-10 flex items-center justify-between lg:hidden">
                <a href="{{ route('home') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424]">
                    <span>🐾</span>
                    <span>RefuPet</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="rounded-full border border-[#aa3a2a] px-5 py-3 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                        Logout
                    </button>
                </form>
            </header>

            <section class="mx-auto max-w-7xl">
                <div>
                    <h1 class="text-5xl font-black tracking-tight text-[#14100f] md:text-6xl">
                        ¡Hola, {{ auth()->user()->name }}! 👋
                    </h1>

                    <p class="mt-4 max-w-3xl text-xl leading-8 text-[#4f3f3c]">
                        Bienvenido de vuelta a tu panel de RefuPet. Aquí puedes seguir el progreso
                        de tus adopciones y descubrir a tu próximo mejor amigo.
                    </p>
                </div>

                <section class="mt-12 grid gap-6 md:grid-cols-3">
                    <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                        <div class="flex items-start justify-between">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#fff3ec] text-2xl text-[#e66f59]">
                                ▻
                            </div>

                            <span class="rounded-full bg-[#f6f3f2] px-3 py-1 text-sm font-extrabold text-[#5d4a47]">
                                Este mes
                            </span>
                        </div>

                        <p class="mt-7 text-5xl font-black text-[#14100f]">
                            3
                        </p>

                        <h3 class="mt-1 text-base font-extrabold text-[#3d302d]">
                            Solicitudes enviadas
                        </h3>
                    </article>

                    <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#fff3ec] text-2xl text-[#f2a900]">
                            📋
                        </div>

                        <p class="mt-7 text-5xl font-black text-[#14100f]">
                            1
                        </p>

                        <h3 class="mt-1 text-base font-extrabold text-[#3d302d]">
                            Solicitudes pendientes
                        </h3>
                    </article>

                    <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#f1f1e8] text-2xl text-[#6d7040]">
                            ✓
                        </div>

                        <p class="mt-7 text-5xl font-black text-[#14100f]">
                            0
                        </p>

                        <h3 class="mt-1 text-base font-extrabold text-[#3d302d]">
                            Solicitudes aprobadas
                        </h3>
                    </article>
                </section>

                <section class="mt-12 rounded-2xl border border-[#efe2df] bg-[#f8f5f4] p-7 shadow-sm">
                    <div class="flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-3xl font-black text-[#14100f]">
                                Revisa el estado de tus adopciones
                            </h2>

                            <p class="mt-2 text-base text-[#5d4a47]">
                                Mantente al tanto de cualquier actualización o documento requerido.
                            </p>
                        </div>

                        <a href="{{ route('user.adoption-requests') }}"
                            class="inline-flex items-center justify-center gap-3 rounded-xl border border-[#deb9b1] bg-white px-6 py-3 text-sm font-extrabold text-[#3d302d] transition hover:bg-[#fff1ee]">
                            Mis Solicitudes
                            <span>→</span>
                        </a>
                    </div>
                </section>

                <section class="mt-14">
                    <div class="mb-7 flex items-center justify-between">
                        <h2 class="text-4xl font-black text-[#14100f]">
                            Perros disponibles
                        </h2>

                        <a href="{{ route('dogs.index') }}"
                            class="text-sm font-extrabold text-[#a93424] hover:underline">
                            Ver todos
                        </a>
                    </div>

                    @if ($dogs->isEmpty())
                        <div class="rounded-2xl border border-[#efe2df] bg-white p-10 text-center shadow-sm">
                            <p class="text-2xl font-black text-[#14100f]">
                                Todavía no hay perros registrados
                            </p>

                            <p class="mt-2 text-[#6d5651]">
                                Cuando el admin agregue perros, aparecerán aquí.
                            </p>
                        </div>
                    @else
                        <div class="grid gap-7 sm:grid-cols-2 xl:grid-cols-4">
                            @foreach ($dogs as $dog)
                                <article class="overflow-hidden rounded-2xl border border-[#efe2df] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-stone-900/10">
                                    <div class="relative h-48 overflow-hidden bg-[#f6f3f2]">
                                        @if ($dog->photo)
                                            <img
                                                src="{{ asset('storage/' . $dog->photo) }}"
                                                alt="{{ $dog->name }}"
                                                class="h-full w-full object-cover">
                                        @else
                                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#f6dad4] to-[#e6e7aa] text-6xl">
                                                🐶
                                            </div>
                                        @endif

                                        <button class="absolute right-4 top-4 flex h-12 w-12 items-center justify-center rounded-full bg-white/90 text-2xl text-[#5d4a47] transition hover:bg-white">
                                            ♡
                                        </button>
                                    </div>

                                    <div class="p-5">
                                        <div class="flex items-start justify-between gap-3">
                                            <h3 class="text-3xl font-black text-[#14100f]">
                                                {{ $dog->name }}
                                            </h3>

                                            @if ($dog->status === 'Disponible')
                                                <span class="rounded-full bg-[#fff0bd] px-3 py-1 text-xs font-extrabold text-[#9a6500]">
                                                    Nueva
                                                </span>
                                            @endif
                                        </div>

                                        <div class="mt-4 flex flex-wrap gap-2">
                                            <span class="rounded-full bg-[#f6f3f2] px-3 py-1 text-xs font-bold text-[#5d4a47]">
                                                {{ $dog->age }}
                                            </span>

                                            <span class="rounded-full bg-[#f6f3f2] px-3 py-1 text-xs font-bold text-[#5d4a47]">
                                                {{ $dog->breed }}
                                            </span>

                                            <span class="rounded-full bg-[#f6f3f2] px-3 py-1 text-xs font-bold text-[#5d4a47]">
                                                {{ $dog->sex }}
                                            </span>
                                        </div>

                                        <a href="{{ route('dogs.show', $dog) }}"
                                            class="mt-6 inline-flex h-12 w-full items-center justify-center rounded-xl bg-[#ece8e7] text-sm font-extrabold text-[#14100f] transition hover:bg-[#ded8d6]">
                                            Ver Perfil
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </section>
            </section>

        </main>
    </div>

</body>
</html>
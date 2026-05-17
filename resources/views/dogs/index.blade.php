<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perros Disponibles | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        @auth
            @if (!auth()->user()->is_admin)
                <x-user-sidebar />
            @endif
        @endauth

        <main class="w-full px-8 py-12 md:px-10 @auth @if (!auth()->user()->is_admin) lg:ml-[285px] @endif @endauth">

            @guest
                <header class="mb-12 flex h-20 items-center justify-between border-b border-[#eadfdb] bg-[#fffdfc]">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424]">
                        <span>🐾</span>
                        <span>RefuPet</span>
                    </a>

                    <nav class="hidden items-center gap-9 md:flex">
                        <a href="{{ route('home') }}"
                            class="text-base font-semibold text-[#3d302d] transition hover:text-[#a93424]">
                            Home
                        </a>
                    </nav>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="hidden text-sm font-extrabold text-[#3d302d] transition hover:text-[#a93424] sm:inline">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="rounded-full bg-[#aa3a2a] px-7 py-3 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                            Register
                        </a>
                    </div>
                </header>
            @endguest

            @auth
                @if (!auth()->user()->is_admin)
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
                @endif
            @endauth

            <section class="border-b border-[#efe2df] pb-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_520px] lg:items-center">
                    <div>
                        <h1 class="text-5xl font-black tracking-tight text-[#a93424] md:text-6xl">
                            Find Your Best Friend
                        </h1>

                        <p class="mt-6 max-w-3xl text-xl leading-8 text-[#4f3f3c]">
                            Explora nuestro catálogo de perros esperando un hogar amoroso.
                            Cada adopción trae alegría tanto a la mascota como a su nueva familia.
                        </p>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <select class="h-14 rounded-full border border-[#deb9b1] bg-[#fffdfc] px-5 text-base font-bold text-[#3d302d] outline-none focus:border-[#aa3a2a]">
                            <option>All Breeds</option>
                        </select>

                        <select class="h-14 rounded-full border border-[#deb9b1] bg-[#fffdfc] px-5 text-base font-bold text-[#3d302d] outline-none focus:border-[#aa3a2a]">
                            <option>Any Size</option>
                        </select>

                        <select class="h-14 rounded-full border border-[#deb9b1] bg-[#fffdfc] px-5 text-base font-bold text-[#3d302d] outline-none focus:border-[#aa3a2a]">
                            <option>Any Age</option>
                        </select>
                    </div>
                </div>
            </section>

            <section class="py-12">
                @if ($dogs->isEmpty())
                    <div class="rounded-3xl border border-[#ecd9d4] bg-white px-8 py-16 text-center shadow-sm">
                        <p class="text-3xl font-black text-[#14100f]">
                            Todavía no hay perros disponibles
                        </p>

                        <p class="mt-3 text-lg text-[#6d5651]">
                            Cuando el admin registre perros, aparecerán aquí.
                        </p>
                    </div>
                @else
                    <div class="grid gap-7 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($dogs as $dog)
                            <article class="overflow-hidden rounded-2xl border border-[#ecd9d4] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-stone-900/10">

                                <div class="relative h-72 overflow-hidden bg-[#f6f3f2]">
                                    @if ($dog->photo)
                                        <img
                                            src="{{ asset('storage/' . $dog->photo) }}"
                                            alt="{{ $dog->name }}"
                                            class="h-full w-full object-cover">
                                    @else
                                        <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#f6dad4] to-[#e6e7aa] text-7xl">
                                            🐶
                                        </div>
                                    @endif

                                    <div class="absolute left-4 top-4">
                                        @if ($dog->status === 'Disponible')
                                            <span class="rounded-full bg-white/85 px-4 py-2 text-sm font-extrabold text-[#4f5a2a] backdrop-blur">
                                                Disponible
                                            </span>
                                        @elseif ($dog->status === 'En Tratamiento')
                                            <span class="rounded-full bg-[#ffd21f] px-4 py-2 text-sm font-extrabold text-[#5c4600]">
                                                Necesita cuidado
                                            </span>
                                        @else
                                            <span class="rounded-full bg-[#dbc4c0] px-4 py-2 text-sm font-extrabold text-[#5d3f39]">
                                                Adoptado
                                            </span>
                                        @endif
                                    </div>

                                    <button class="absolute right-4 top-4 flex h-11 w-11 items-center justify-center rounded-full bg-white/85 text-2xl text-[#5d4a47] backdrop-blur transition hover:bg-white">
                                        ♡
                                    </button>
                                </div>

                                <div class="p-6">
                                    <div class="flex items-start justify-between gap-4">
                                        <h2 class="text-4xl font-black tracking-tight text-[#14100f]">
                                            {{ $dog->name }}
                                        </h2>

                                        <span class="rounded-md bg-[#fff3ec] px-3 py-1 text-sm font-extrabold text-[#a93424]">
                                            {{ $dog->sex === 'Macho' ? 'Male' : 'Female' }}
                                        </span>
                                    </div>

                                    <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-base font-semibold text-[#5d4a47]">
                                        <span>📅 {{ $dog->age }}</span>
                                        <span>🐾 {{ $dog->breed }}</span>
                                        <span>▰ Medium</span>
                                    </div>

                                    @if ($dog->description)
                                        <p class="mt-4 line-clamp-2 text-sm leading-6 text-[#7a625d]">
                                            {{ $dog->description }}
                                        </p>
                                    @endif

                                    <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                                        <a href="{{ route('dogs.show', $dog) }}"
                                            class="inline-flex h-12 flex-1 items-center justify-center rounded-full border border-[#aa3a2a] px-5 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                            Ver más detalles
                                        </a>

                                        @auth
                                            <a href="{{ route('dogs.show', $dog) }}"
                                                class="inline-flex h-12 flex-1 items-center justify-center rounded-full bg-[#aa3a2a] px-5 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                                                Solicitar adopción
                                            </a>
                                        @else
                                            <button
                                                type="button"
                                                onclick="alert('Primero debes iniciar sesión para solicitar una adopción.')"
                                                class="inline-flex h-12 flex-1 items-center justify-center rounded-full bg-[#aa3a2a] px-5 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                                                Solicitar adopción
                                            </button>
                                        @endauth
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $dogs->links() }}
                    </div>
                @endif
            </section>

        </main>
    </div>

    @guest
        <x-footer />
    @endguest

</body>
</html>
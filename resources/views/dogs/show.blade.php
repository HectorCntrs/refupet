<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $dog->name }} | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fffdfc] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        @auth
            @if (!auth()->user()->is_admin)
                <x-user-sidebar />
            @endif
        @endauth

        <main class="w-full px-8 py-9 md:px-10 @auth @if (!auth()->user()->is_admin) lg:ml-[285px] @endif @endauth">

            @guest
                <header class="mb-10 flex h-20 items-center justify-between border-b border-[#eadfdb] bg-[#fffdfc]">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 text-2xl font-extrabold text-[#a93424]">
                        <span>🐾</span>
                        <span>RefuPet</span>
                    </a>

                    <nav class="hidden items-center gap-9 md:flex">
                        <a href="{{ route('home') }}"
                            class="text-base font-semibold text-[#3d302d] transition hover:text-[#a93424]">
                            Home
                        </a>

                        <a href="{{ route('dogs.index') }}"
                            class="border-b-2 border-[#a93424] pb-2 text-base font-extrabold text-[#a93424]">
                            Available Dogs
                        </a>
                    </nav>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="hidden text-sm font-extrabold text-[#3d302d] transition hover:text-[#a93424] sm:inline">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="rounded-full bg-[#e66f59] px-7 py-3 text-sm font-extrabold text-[#351713] shadow-lg shadow-red-900/10 transition hover:bg-[#d85f49]">
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

            <section class="mx-auto max-w-7xl">

                <a href="{{ route('dogs.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-extrabold text-[#3d302d] transition hover:text-[#a93424]">
                    ← Back to Available Dogs
                </a>

                <div class="mt-8 grid gap-9 lg:grid-cols-[1fr_370px] lg:items-start">

                    <section>
                        <div class="relative overflow-hidden rounded-2xl bg-[#f6f3f2] shadow-sm">
                            @if ($dog->photo)
                                <img src="{{ asset('storage/' . $dog->photo) }}" alt="{{ $dog->name }}"
                                    class="h-[560px] w-full object-cover">
                            @else
                                <div
                                    class="flex h-[560px] w-full items-center justify-center bg-gradient-to-br from-[#f6dad4] to-[#e6e7aa] text-8xl">
                                    🐶
                                </div>
                            @endif

                            <div class="absolute right-5 top-5 flex gap-3">
                                <button
                                    class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 text-3xl text-[#5d4a47] shadow-sm backdrop-blur transition hover:bg-white">
                                    ♡
                                </button>

                                <button
                                    class="flex h-14 w-14 items-center justify-center rounded-full bg-white/90 text-2xl text-[#5d4a47] shadow-sm backdrop-blur transition hover:bg-white">
                                    ↗
                                </button>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-3">
                            @if ($dog->status === 'Disponible')
                                <span
                                    class="rounded-full bg-[#ffd21f] px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-[#7a5100]">
                                    Disponible
                                </span>
                            @elseif ($dog->status === 'En Tratamiento')
                                <span
                                    class="rounded-full bg-[#ffdcd6] px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-[#a93424]">
                                    En tratamiento
                                </span>
                            @else
                                <span
                                    class="rounded-full bg-[#dbc4c0] px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-[#5d3f39]">
                                    Adoptado
                                </span>
                            @endif

                            <span
                                class="rounded-full bg-[#eee9e7] px-4 py-2 text-xs font-extrabold uppercase tracking-wide text-[#655551]">
                                Vacunado
                            </span>
                        </div>

                        <h1 class="mt-5 text-5xl font-black tracking-tight text-[#14100f] md:text-6xl">
                            {{ $dog->name }}
                        </h1>

                        <p class="mt-3 text-2xl font-bold text-[#3d302d]">
                            {{ $dog->breed }} • {{ $dog->age }} • {{ $dog->sex }}
                        </p>

                        <div class="mt-9 grid gap-4 md:grid-cols-2">
                            <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                                <div class="mb-5 flex items-center gap-3">
                                    <span class="text-2xl text-[#a93424]">📖</span>
                                    <h2 class="text-2xl font-black text-[#14100f]">
                                        Descripción
                                    </h2>
                                </div>

                                <p class="text-base leading-7 text-[#5d4a47]">
                                    {{ $dog->description ?: 'Todavía no hay descripción registrada para este perro.' }}
                                </p>
                            </article>

                            <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                                <div class="mb-5 flex items-center gap-3">
                                    <span class="text-2xl text-[#6d7040]">🩺</span>
                                    <h2 class="text-2xl font-black text-[#14100f]">
                                        Health Status
                                    </h2>
                                </div>

                                <ul class="space-y-3 text-base text-[#5d4a47]">
                                    <li class="flex items-center gap-2">
                                        <span class="text-[#6d7040]">✓</span>
                                        Vacunado
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <span class="text-[#6d7040]">✓</span>
                                        Revisión veterinaria
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <span class="text-[#6d7040]">✓</span>
                                        Listo para adopción
                                    </li>
                                </ul>
                            </article>
                        </div>

                        <article class="mt-4 rounded-2xl bg-[#f8f5f4] p-7 shadow-sm">
                            <div class="mb-5 flex items-center gap-3">
                                <span class="text-2xl text-[#a93424]">🐾</span>
                                <h2 class="text-2xl font-black text-[#14100f]">
                                    Historia de {{ $dog->name }}
                                </h2>
                            </div>

                            <p class="text-base leading-8 text-[#5d4a47]">
                                {{ $dog->description ?: $dog->name . ' está buscando una familia amorosa que pueda darle un hogar seguro, paciencia y mucho cariño.' }}
                            </p>
                        </article>
                    </section>

                    <aside class="rounded-2xl bg-white p-8 shadow-xl shadow-stone-900/10 lg:sticky lg:top-8">
                        <h2 class="text-3xl font-black text-[#14100f]">
                            Adoption Request
                        </h2>

                        <p class="mt-2 text-base leading-6 text-[#5d4a47]">
                            ¿Interesado en {{ $dog->name }}? Llena esta solicitud rápida para comenzar el proceso.
                        </p>

                        <div class="my-5 h-px bg-[#efe2df]"></div>

                        @auth
                            <form action="{{ route('adoption-requests.store', $dog) }}" method="POST" class="space-y-5">
                                @csrf

                                @if (session('success'))
                                    <div
                                        class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-bold text-green-700">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                                        <ul class="list-disc pl-5">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div>
                                    <label for="email"
                                        class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                        Correo electrónico
                                    </label>

                                    <input id="email" name="email" type="email"
                                        value="{{ old('email', auth()->user()->email) }}" placeholder="tu@email.com"
                                        required
                                        class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                </div>

                                <div>
                                    <label for="reason"
                                        class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                        Motivo de adopción
                                    </label>

                                    <textarea id="reason" name="reason" rows="4" required
                                        placeholder="Cuéntanos por qué quieres adoptar a {{ $dog->name }}..."
                                        class="w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 py-3 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">{{ old('reason') }}</textarea>
                                </div>

                                <div>
                                    <label for="experience"
                                        class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                        Experiencia con mascotas
                                    </label>

                                    <select id="experience" name="experience" required
                                        class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                        <option value="">Selecciona una opción</option>
                                        <option value="Primera mascota" @selected(old('experience') === 'Primera mascota')>
                                            Primera mascota
                                        </option>
                                        <option value="Ya he tenido perros" @selected(old('experience') === 'Ya he tenido perros')>
                                            Ya he tenido perros
                                        </option>
                                        <option value="Tengo mascotas actualmente" @selected(old('experience') === 'Tengo mascotas actualmente')>
                                            Tengo mascotas actualmente
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label for="address"
                                        class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                        Dirección o zona
                                    </label>

                                    <input id="address" name="address" type="text" value="{{ old('address') }}" required
                                        placeholder="Ciudad, Barrio"
                                        class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                </div>

                                <div>
                                    <label for="phone"
                                        class="mb-2 block text-sm font-extrabold tracking-wide text-[#3d302d]">
                                        Teléfono de contacto
                                    </label>

                                    <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required
                                        placeholder="+1 (555) 000-0000"
                                        class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-base outline-none placeholder:text-[#9b8985] focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                                </div>

                                <button type="submit"
                                    class="h-14 w-full rounded-xl bg-[#aa3a2a] text-sm font-extrabold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922f22]">
                                    Enviar Solicitud ▷
                                </button>

                                <p class="text-center text-xs leading-5 text-[#9b8985]">
                                    Al enviar, aceptas nuestros términos de adopción.
                                </p>
                            </form>
                        @else
                            <div class="rounded-2xl border border-[#ffdcd6] bg-[#fff7f5] p-5">
                                <p class="text-base font-extrabold text-[#a93424]">
                                    Primero debes iniciar sesión
                                </p>

                                <p class="mt-2 text-sm leading-6 text-[#6d5651]">
                                    Para solicitar la adopción de {{ $dog->name }}, necesitas tener una cuenta en RefuPet.
                                </p>

                                <div class="mt-5 flex flex-col gap-3">
                                    <a href="{{ route('login') }}"
                                        class="inline-flex h-12 items-center justify-center rounded-xl bg-[#aa3a2a] text-sm font-extrabold text-white transition hover:bg-[#922f22]">
                                        Iniciar sesión
                                    </a>

                                    <a href="{{ route('register') }}"
                                        class="inline-flex h-12 items-center justify-center rounded-xl border border-[#aa3a2a] text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                        Crear cuenta
                                    </a>
                                </div>
                            </div>
                        @endauth
                    </aside>
                </div>
            </section>

        </main>
    </div>

    @guest
        <x-footer />
    @endguest

</body>

</html>
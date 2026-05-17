<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Solicitudes | RefuPet</title>

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

            <section class="mx-auto max-w-7xl">
                <div>
                    <h1 class="text-5xl font-black tracking-tight text-[#14100f] md:text-6xl">
                        Mis Solicitudes de Adopción
                    </h1>

                    <p class="mt-4 max-w-3xl text-xl leading-8 text-[#4f3f3c]">
                        Aquí puedes revisar el estado de las solicitudes que has enviado.
                    </p>
                </div>

                @if ($requests->isEmpty())
                    <section class="mt-10 rounded-3xl border border-[#efe2df] bg-white p-12 text-center shadow-sm">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#fff3ec] text-4xl">
                            🐾
                        </div>

                        <h2 class="mt-6 text-3xl font-black text-[#14100f]">
                            Aún no has enviado solicitudes
                        </h2>

                        <p class="mt-3 text-lg text-[#6d5651]">
                            Cuando solicites adoptar un perro, aparecerá aquí.
                        </p>

                        <a href="{{ route('dogs.index') }}"
                            class="mt-8 inline-flex rounded-xl bg-[#aa3a2a] px-7 py-4 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                            Ver perros disponibles
                        </a>
                    </section>
                @else
                    <section class="mt-10 grid gap-6">
                        @foreach ($requests as $request)
                            <article
                                class="rounded-3xl border border-[#efe2df] bg-white p-5 shadow-sm transition hover:shadow-xl hover:shadow-stone-900/10">
                                <div class="grid gap-6 lg:grid-cols-[220px_1fr]">

                                    <div
                                        class="relative h-[220px] w-full overflow-hidden rounded-2xl bg-[#f6f3f2] lg:h-[220px] lg:w-[220px]">
                                        @if ($request->dog?->photo)
                                            <img src="{{ asset('storage/' . $request->dog->photo) }}"
                                                alt="{{ $request->dog->name }}" class="h-full w-full object-cover">
                                        @else
                                            <div
                                                class="flex h-full w-full items-center justify-center bg-gradient-to-br from-[#f6dad4] to-[#e6e7aa] text-6xl">
                                                🐶
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Contenido --}}
                                    <div class="flex flex-col justify-between">
                                        <div>
                                            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                                                <div>
                                                    <p class="text-sm font-extrabold uppercase tracking-wide text-[#a93424]">
                                                        Solicitud #{{ $request->id }}
                                                    </p>

                                                    <h2 class="mt-2 text-4xl font-black leading-tight text-[#14100f]">
                                                        {{ $request->dog->name ?? 'Perro eliminado' }}
                                                    </h2>

                                                    <p class="mt-2 text-lg font-bold text-[#4f3f3c]">
                                                        {{ $request->dog->breed ?? 'Sin raza' }}
                                                    </p>
                                                </div>

                                                @if ($request->status === 'Pendiente')
                                                    <span
                                                        class="w-fit rounded-full bg-[#fff0bd] px-5 py-2 text-sm font-extrabold text-[#9a6500]">
                                                        Pendiente
                                                    </span>
                                                @elseif ($request->status === 'Aprobada')
                                                    <span
                                                        class="w-fit rounded-full bg-[#e9eadf] px-5 py-2 text-sm font-extrabold text-[#60623e]">
                                                        Aprobada
                                                    </span>
                                                @else
                                                    <span
                                                        class="w-fit rounded-full bg-[#ffdcd6] px-5 py-2 text-sm font-extrabold text-[#a93424]">
                                                        Rechazada
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="mt-6 grid gap-4 md:grid-cols-3">
                                                <div class="rounded-2xl bg-[#fffdfc] p-4">
                                                    <p class="text-xs font-extrabold uppercase tracking-wide text-[#7a625d]">
                                                        Fecha
                                                    </p>

                                                    <p class="mt-1 font-bold text-[#14100f]">
                                                        {{ $request->created_at->format('d/m/Y') }}
                                                    </p>
                                                </div>

                                                <div class="rounded-2xl bg-[#fffdfc] p-4">
                                                    <p class="text-xs font-extrabold uppercase tracking-wide text-[#7a625d]">
                                                        Teléfono
                                                    </p>

                                                    <p class="mt-1 font-bold text-[#14100f]">
                                                        {{ $request->phone }}
                                                    </p>
                                                </div>

                                                <div class="rounded-2xl bg-[#fffdfc] p-4">
                                                    <p class="text-xs font-extrabold uppercase tracking-wide text-[#7a625d]">
                                                        Correo
                                                    </p>

                                                    <p class="mt-1 truncate font-bold text-[#14100f]">
                                                        {{ $request->email }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-5 rounded-2xl border border-[#efe2df] bg-[#fffdfc] p-5">
                                                <p class="text-sm font-extrabold text-[#3d302d]">
                                                    Motivo de adopción
                                                </p>

                                                <p class="mt-2 text-sm leading-6 text-[#6d5651]">
                                                    {{ $request->reason }}
                                                </p>

                                                <div class="mt-4 grid gap-2 text-sm text-[#7a625d] md:grid-cols-2">
                                                    <p>
                                                        <span class="font-extrabold text-[#3d302d]">
                                                            Experiencia:
                                                        </span>
                                                        {{ $request->experience }}
                                                    </p>

                                                    <p>
                                                        <span class="font-extrabold text-[#3d302d]">
                                                            Dirección/Zona:
                                                        </span>
                                                        {{ $request->address }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-6 flex flex-wrap gap-3">
                                            @if ($request->dog)
                                                <a href="{{ route('dogs.show', $request->dog) }}"
                                                    class="inline-flex h-12 items-center justify-center rounded-xl border border-[#deb9b1] px-5 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                                    Ver perro
                                                </a>
                                            @endif

                                            <a href="{{ route('dogs.index') }}"
                                                class="inline-flex h-12 items-center justify-center rounded-xl bg-[#aa3a2a] px-5 text-sm font-extrabold text-white transition hover:bg-[#922f22]">
                                                Ver más perros
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>
                @endif
            </section>

        </main>
    </div>
</body>

</html>
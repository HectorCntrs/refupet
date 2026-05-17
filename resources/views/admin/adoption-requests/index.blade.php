<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Adopción | RefuPet Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fbf8f7] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        <x-admin-sidebar />

        <main class="w-full px-5 py-8 lg:ml-[285px] lg:px-11 lg:py-12">

            <section class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">
                <div>
                    <h1 class="text-4xl font-black tracking-tight text-[#14100f] md:text-5xl">
                        Solicitudes de Adopción
                    </h1>

                    <p class="mt-3 text-lg text-[#4f3f3c]">
                        Administra y revisa las solicitudes recibidas para los perros del refugio.
                    </p>
                </div>

                <form method="GET" action="{{ route('admin.adoption-requests.index') }}" class="w-full max-w-md">
                    <div class="flex h-16 items-center rounded-full border border-[#deb9b1] bg-white px-6 shadow-sm">
                        <span class="mr-4 text-2xl text-[#3d302d]">⌕</span>

                        <input type="text" name="search" value="{{ $search }}" placeholder="Buscar solicitudes..."
                            class="w-full border-none bg-transparent text-base text-[#3d302d] outline-none placeholder:text-[#9b8985] focus:outline-none">
                    </div>
                </form>
            </section>

            @if (session('success'))
                <div
                    class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <section class="mt-8 overflow-hidden rounded-2xl border border-[#ecd9d4] bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[1000px] border-collapse">
                        <thead>
                            <tr
                                class="border-b border-[#efe2df] bg-[#fbf8f7] text-left text-base font-extrabold text-[#4d342f]">
                                <th class="px-7 py-5">Usuario</th>
                                <th class="px-7 py-5">Perro solicitado</th>
                                <th class="px-7 py-5">Fecha</th>
                                <th class="px-7 py-5">Contacto</th>
                                <th class="px-7 py-5">Estado</th>
                                <th class="px-7 py-5 text-right">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#f0e6e3] text-base">
                            @forelse ($requests as $request)
                                <tr class="transition hover:bg-[#fffaf8]">
                                    <td class="px-7 py-5">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#eee9e7] text-base font-black text-[#4d342f]">
                                                {{ strtoupper(substr($request->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $request->name)[1] ?? '', 0, 1)) }}
                                            </div>

                                            <div>
                                                <p class="font-extrabold text-[#14100f]">
                                                    {{ $request->name }}
                                                </p>

                                                <p class="text-sm text-[#6d5651]">
                                                    {{ $request->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-7 py-5">
                                        <div class="flex items-center gap-4">
                                            @if ($request->dog?->photo)
                                                <img src="{{ asset('storage/' . $request->dog->photo) }}"
                                                    alt="{{ $request->dog->name }}" class="h-12 w-12 rounded-xl object-cover">
                                            @else
                                                <div
                                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#dedbd9] text-2xl">
                                                    🐶
                                                </div>
                                            @endif

                                            <div>
                                                <p class="font-extrabold text-[#14100f]">
                                                    {{ $request->dog->name ?? 'Perro eliminado' }}
                                                </p>

                                                <p class="text-sm text-[#6d5651]">
                                                    {{ $request->dog->breed ?? 'Sin raza' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-7 py-5 text-[#4f3f3c]">
                                        {{ $request->created_at->format('d M Y') }}
                                    </td>

                                    <td class="px-7 py-5">
                                        <p class="font-bold text-[#3d302d]">
                                            {{ $request->phone }}
                                        </p>

                                        <p class="text-sm text-[#6d5651]">
                                            {{ $request->address }}
                                        </p>
                                    </td>

                                    <td class="px-7 py-5">
                                        @if ($request->status === 'Pendiente')
                                            <span
                                                class="rounded-full bg-[#fff0bd] px-4 py-2 text-sm font-extrabold text-[#9a6500]">
                                                Pendiente
                                            </span>
                                        @elseif ($request->status === 'Aprobada')
                                            <span
                                                class="rounded-full bg-[#e9eadf] px-4 py-2 text-sm font-extrabold text-[#60623e]">
                                                Aprobada
                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-[#ffdcd6] px-4 py-2 text-sm font-extrabold text-[#a93424]">
                                                Rechazada
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-7 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            @if ($request->status !== 'Aprobada')
                                                <form method="POST"
                                                    action="{{ route('admin.adoption-requests.approve', $request) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="rounded-lg border border-[#d7d9a0] bg-[#f5f6db] px-4 py-2 text-sm font-extrabold text-[#60623e] transition hover:bg-[#e9eadf]">
                                                        Aprobar
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($request->status !== 'Rechazada')
                                                <form method="POST"
                                                    action="{{ route('admin.adoption-requests.reject', $request) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-sm font-extrabold text-red-600 transition hover:bg-red-100">
                                                        Rechazar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <tr class="bg-[#fffdfc]">
                                    <td colspan="6" class="px-7 pb-5">
                                        <div class="rounded-2xl border border-[#efe2df] bg-white px-5 py-4">
                                            <p class="text-sm font-extrabold text-[#3d302d]">
                                                Motivo de adopción
                                            </p>

                                            <p class="mt-2 text-sm leading-6 text-[#6d5651]">
                                                {{ $request->reason }}
                                            </p>

                                            <p class="mt-3 text-sm text-[#7a625d]">
                                                <span class="font-extrabold text-[#3d302d]">Experiencia:</span>
                                                {{ $request->experience }}
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-7 py-16 text-center">
                                        <p class="text-2xl font-black text-[#14100f]">
                                            No hay solicitudes todavía
                                        </p>

                                        <p class="mt-2 text-[#6d5651]">
                                            Cuando un usuario solicite adoptar un perro, aparecerá aquí.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div
                    class="flex flex-col gap-4 border-t border-[#efe2df] px-7 py-5 md:flex-row md:items-center md:justify-between">
                    <p class="text-base text-[#4f3f3c]">
                        Mostrando {{ $requests->firstItem() ?? 0 }} a {{ $requests->lastItem() ?? 0 }}
                        de {{ $requests->total() }} solicitudes
                    </p>

                    <div>
                        {{ $requests->links() }}
                    </div>
                </div>
            </section>

        </main>
    </div>

</body>

</html>
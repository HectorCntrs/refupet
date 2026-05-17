<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Perros | RefuPet Admin</title>

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
                        Gestión de Perros
                    </h1>

                    <p class="mt-3 text-lg text-[#4f3f3c]">
                        Administra los perfiles de los perros disponibles en el refugio.
                    </p>
                </div>

                <a href="{{ route('admin.dogs.create') }}"
                    class="inline-flex items-center justify-center gap-3 rounded-2xl bg-[#aa3a2a] px-8 py-4 text-base font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
                    <span class="text-2xl leading-none">＋</span>
                    Agregar Perro
                </a>
            </section>

            @if (session('success'))
                <div
                    class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <section class="mt-8 rounded-2xl border border-[#ecd9d4] bg-white p-4 shadow-sm">
                <div class="grid gap-4 lg:grid-cols-[1fr_180px_56px]">
                    <div class="flex h-14 items-center rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4">
                        <span class="mr-3 text-2xl text-[#5e4641]">⌕</span>

                        <input type="text" placeholder="Buscar por nombre, raza..."
                            class="w-full border-none bg-transparent text-lg text-[#3d302d] outline-none placeholder:text-[#9b8985] focus:outline-none">
                    </div>

                    <select
                        class="h-14 rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg text-[#3d302d] outline-none focus:border-[#aa3a2a]">
                        <option>Estado</option>
                        <option>Disponible</option>
                        <option>En Tratamiento</option>
                        <option>Adoptado</option>
                    </select>

                    <button
                        class="flex h-14 items-center justify-center rounded-xl border border-[#deb9b1] bg-[#fffdfc] text-2xl text-[#3d302d] transition hover:bg-[#fff1ee]">
                        ≡
                    </button>
                </div>
            </section>

            <section class="mt-7 overflow-hidden rounded-2xl border border-[#ecd9d4] bg-white shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px] border-collapse">
                        <thead>
                            <tr
                                class="border-b border-[#efe2df] bg-[#fbf8f7] text-left text-base font-extrabold text-[#4d342f]">
                                <th class="px-5 py-5">Foto</th>
                                <th class="px-5 py-5">Nombre</th>
                                <th class="px-5 py-5">Edad</th>
                                <th class="px-5 py-5">Raza</th>
                                <th class="px-5 py-5">Sexo</th>
                                <th class="px-5 py-5">Estado</th>
                                <th class="px-5 py-5 text-right">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#f0e6e3] text-lg">
                            @forelse ($dogs as $dog)
                                <tr class="transition hover:bg-[#fffaf8]">
                                    <td class="px-5 py-5">
                                        @if ($dog->photo)
                                            <img src="{{ asset('storage/' . $dog->photo) }}" alt="{{ $dog->name }}"
                                                class="h-14 w-14 rounded-xl object-cover">
                                        @else
                                            <div
                                                class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#dedbd9] text-2xl text-[#5d4a47]">
                                                🐶
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-5 py-5 font-extrabold text-black">
                                        {{ $dog->name }}
                                    </td>

                                    <td class="px-5 py-5 text-[#4f3f3c]">
                                        {{ $dog->age }}
                                    </td>

                                    <td class="px-5 py-5 text-[#4f3f3c]">
                                        {{ $dog->breed }}
                                    </td>

                                    <td class="px-5 py-5 text-[#4f3f3c]">
                                        {{ $dog->sex }}
                                    </td>

                                    <td class="px-5 py-5">
                                        @if ($dog->status === 'Disponible')
                                            <span
                                                class="rounded-full bg-[#e9eadf] px-3 py-1 text-sm font-extrabold text-[#60623e]">
                                                Disponible
                                            </span>
                                        @elseif ($dog->status === 'En Tratamiento')
                                            <span
                                                class="rounded-full bg-[#f6ded9] px-3 py-1 text-sm font-extrabold text-[#a93424]">
                                                En Tratamiento
                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-[#dbc4c0] px-3 py-1 text-sm font-extrabold text-[#5d3f39]">
                                                Adoptado
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-5 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.dogs.edit', $dog) }}"
                                                class="rounded-lg border border-[#deb9b1] px-3 py-2 text-sm font-bold text-[#a93424] hover:bg-[#fff1ee]">
                                                Editar
                                            </a>

                                            <form method="POST" action="{{ route('admin.dogs.destroy', $dog) }}"
                                                onsubmit="return confirm('¿Seguro que quieres eliminar este perro?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="rounded-lg border border-red-200 px-3 py-2 text-sm font-bold text-red-600 hover:bg-red-50">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-14 text-center">
                                        <p class="text-2xl font-black text-[#14100f]">
                                            Todavía no hay perros registrados
                                        </p>

                                        <p class="mt-2 text-[#6d5651]">
                                            Agrega el primero para empezar a llenar el catálogo.
                                        </p>

                                        <a href="{{ route('admin.dogs.create') }}"
                                            class="mt-6 inline-flex rounded-xl bg-[#aa3a2a] px-6 py-3 text-sm font-extrabold text-white transition hover:bg-[#922f22]">
                                            Agregar perro
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($dogs->hasPages())
                    <div class="border-t border-[#efe2df] px-5 py-5">
                        {{ $dogs->links() }}
                    </div>
                @endif
            </section>

        </main>
    </div>

</body>

</html>
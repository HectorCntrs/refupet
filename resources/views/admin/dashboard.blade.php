<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | RefuPet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fbf8f7] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        <x-admin-sidebar />

        <main class="w-full px-5 py-8 lg:ml-[285px] lg:px-11 lg:py-10">

            <header class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                <div>
                    <h1 class="text-4xl font-black tracking-tight text-[#14100f] md:text-5xl">
                        Dashboard del Administrador
                    </h1>

                    <p class="mt-3 text-lg text-[#4f3f3c]">
                        Resumen general de las operaciones del refugio.
                    </p>
                </div>

                <div class="flex items-center gap-5">
                    <p class="hidden text-base font-bold text-[#2d1c18] md:block">
                        Hoy, {{ now()->format('d M Y') }}
                    </p>

                    <button
                        class="relative flex h-14 w-14 items-center justify-center rounded-full bg-white text-2xl shadow-lg shadow-stone-900/10 transition hover:bg-[#fff1ee]">
                        🔔
                        <span class="absolute right-3 top-3 h-2.5 w-2.5 rounded-full bg-red-500"></span>
                    </button>
                </div>
            </header>

            <!-- Stats -->
            <section
                style="display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 24px; margin-top: 36px;">

                <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#ede8e8] text-2xl">
                            🐾
                        </div>

                        <span class="rounded-lg bg-[#ffdcd6] px-3 py-1 text-sm font-extrabold text-[#a93424]">
                            +4 este mes
                        </span>
                    </div>

                    <p class="mt-7 text-5xl font-black leading-none text-[#14100f]">45</p>

                    <h3 class="mt-2 text-sm font-extrabold uppercase tracking-wide text-[#3d302d]">
                        Total de perros
                    </h3>
                </article>

                <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#e6e7aa] text-2xl">
                            ✅
                        </div>

                        <span class="rounded-lg bg-[#eee9e7] px-3 py-1 text-sm font-extrabold text-[#655551]">
                            Estable
                        </span>
                    </div>

                    <p class="mt-7 text-5xl font-black leading-none text-[#14100f]">12</p>

                    <h3 class="mt-2 text-sm font-extrabold uppercase tracking-wide text-[#3d302d]">
                        Perros disponibles
                    </h3>
                </article>

                <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#ffc107] text-2xl">
                            📋
                        </div>

                        <span class="rounded-lg bg-[#ffe3a3] px-3 py-1 text-sm font-extrabold text-[#bd7900]">
                            Atención Req.
                        </span>
                    </div>

                    <p class="mt-7 text-5xl font-black leading-none text-[#14100f]">8</p>

                    <h3 class="mt-2 text-sm font-extrabold uppercase tracking-wide text-[#3d302d]">
                        Solicitudes pendientes
                    </h3>
                </article>

                <article class="rounded-2xl border border-[#efe2df] bg-white p-7 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-[#e8e8e0] text-2xl">
                            ☑️
                        </div>

                        <span class="rounded-lg bg-[#eee9e7] px-3 py-1 text-sm font-extrabold text-[#655551]">
                            Histórico
                        </span>
                    </div>

                    <p class="mt-7 text-5xl font-black leading-none text-[#14100f]">25</p>

                    <h3 class="mt-2 text-sm font-extrabold uppercase tracking-wide text-[#3d302d]">
                        Solicitudes aprobadas
                    </h3>
                </article>

            </section>

            <!-- Activity redesigned full width -->
            <section class="mt-8 overflow-hidden rounded-2xl border border-[#efe2df] bg-white shadow-sm">

                <div
                    class="flex flex-col gap-4 border-b border-[#efe2df] px-7 py-6 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-black text-[#14100f]">
                            Actividad Reciente
                        </h2>

                        <p class="mt-1 text-base text-[#6d5651]">
                            Últimos movimientos importantes dentro del refugio.
                        </p>
                    </div>

                    <a href="#"
                        class="inline-flex items-center justify-center rounded-xl border border-[#deb9b1] px-5 py-3 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                        Ver todo el historial
                    </a>
                </div>

                <div class="grid gap-0 xl:grid-cols-[1.1fr_0.9fr]">

                    <!-- Main activity list -->
                    <div class="divide-y divide-[#f0e6e3]">

                        <article class="flex gap-5 px-7 py-6 transition hover:bg-[#fffaf8]">
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#ffc107] text-2xl">
                                📩
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <h3 class="text-xl font-extrabold text-[#14100f]">
                                            Nueva solicitud de adopción
                                        </h3>

                                        <p class="mt-1 text-base text-[#4f3f3c]">
                                            Para:
                                            <span class="font-extrabold text-[#a93424]">
                                                Luna (Golden Retriever)
                                            </span>
                                        </p>
                                    </div>

                                    <span
                                        class="w-fit rounded-full bg-[#fff0bd] px-3 py-1 text-sm font-extrabold text-[#9a6500]">
                                        Pendiente
                                    </span>
                                </div>

                                <p class="mt-3 max-w-3xl text-sm leading-6 text-[#7a625d]">
                                    Una familia envió una nueva solicitud. Revisa datos de contacto, experiencia previa
                                    con mascotas y condiciones del hogar.
                                </p>

                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-bold text-[#8a746f]">
                                        Hace 10 minutos
                                    </span>

                                    <a href="#"
                                        class="rounded-lg bg-[#aa3a2a] px-4 py-2 text-sm font-extrabold text-white transition hover:bg-[#922f22]">
                                        Revisar solicitud
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="flex gap-5 px-7 py-6 transition hover:bg-[#fffaf8]">
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#e6e7aa] text-2xl">
                                🐕
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <h3 class="text-xl font-extrabold text-[#14100f]">
                                            Adopción aprobada
                                        </h3>

                                        <p class="mt-1 text-base text-[#4f3f3c]">
                                            Familia García - Rex
                                        </p>
                                    </div>

                                    <span
                                        class="w-fit rounded-full bg-[#e9eadf] px-3 py-1 text-sm font-extrabold text-[#60623e]">
                                        Aprobado
                                    </span>
                                </div>

                                <p class="mt-3 max-w-3xl text-sm leading-6 text-[#7a625d]">
                                    La solicitud fue marcada como aprobada. El siguiente paso es coordinar fecha de
                                    entrega y seguimiento post-adopción.
                                </p>

                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-bold text-[#8a746f]">
                                        Hace 2 horas
                                    </span>

                                    <a href="#"
                                        class="rounded-lg border border-[#deb9b1] px-4 py-2 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                        Ver detalle
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="flex gap-5 px-7 py-6 transition hover:bg-[#fffaf8]">
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#dedbd9] text-2xl">
                                🖼️
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <h3 class="text-xl font-extrabold text-[#14100f]">
                                            Nuevas fotos añadidas
                                        </h3>

                                        <p class="mt-1 text-base text-[#4f3f3c]">
                                            Perfil actualizado para Max
                                        </p>
                                    </div>

                                    <span
                                        class="w-fit rounded-full bg-[#eee9e7] px-3 py-1 text-sm font-extrabold text-[#655551]">
                                        Actualización
                                    </span>
                                </div>

                                <p class="mt-3 max-w-3xl text-sm leading-6 text-[#7a625d]">
                                    Se agregaron nuevas imágenes al perfil para mejorar su visibilidad en la página de
                                    perros disponibles.
                                </p>

                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-bold text-[#8a746f]">
                                        Ayer, 16:45
                                    </span>

                                    <a href="#"
                                        class="rounded-lg border border-[#deb9b1] px-4 py-2 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                        Ver perfil
                                    </a>
                                </div>
                            </div>
                        </article>

                        <article class="flex gap-5 px-7 py-6 transition hover:bg-[#fffaf8]">
                            <div
                                class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#ffdcd6] text-2xl">
                                🩺
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <h3 class="text-xl font-extrabold text-[#14100f]">
                                            Registro veterinario
                                        </h3>

                                        <p class="mt-1 text-base text-[#4f3f3c]">
                                            Vacunación programada - Bella
                                        </p>
                                    </div>

                                    <span
                                        class="w-fit rounded-full bg-[#f6ded9] px-3 py-1 text-sm font-extrabold text-[#a93424]">
                                        Médico
                                    </span>
                                </div>

                                <p class="mt-3 max-w-3xl text-sm leading-6 text-[#7a625d]">
                                    Se programó una nueva revisión veterinaria. Falta confirmar asistencia y actualizar
                                    el expediente médico.
                                </p>

                                <div class="mt-4 flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-bold text-[#8a746f]">
                                        Ayer, 09:30
                                    </span>

                                    <a href="#"
                                        class="rounded-lg border border-[#deb9b1] px-4 py-2 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                        Ver expediente
                                    </a>
                                </div>
                            </div>
                        </article>

                    </div>

                    <!-- Summary side panel -->
                    <aside class="border-t border-[#efe2df] bg-[#fffdfc] p-7 xl:border-l xl:border-t-0">
                        <h3 class="text-2xl font-black text-[#14100f]">
                            Resumen rápido
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-[#7a625d]">
                            Pendientes que conviene revisar hoy antes de cerrar operación.
                        </p>

                        <div class="mt-6 space-y-4">
                            <div class="rounded-2xl border border-[#f0e1dd] bg-white p-5">
                                <div class="flex items-center justify-between">
                                    <p class="font-extrabold text-[#3d302d]">
                                        Solicitudes sin revisar
                                    </p>

                                    <span
                                        class="rounded-full bg-[#fff0bd] px-3 py-1 text-sm font-extrabold text-[#9a6500]">
                                        8
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-[#7a625d]">
                                    Prioriza las solicitudes con más de 24 horas.
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#f0e1dd] bg-white p-5">
                                <div class="flex items-center justify-between">
                                    <p class="font-extrabold text-[#3d302d]">
                                        Perros en tratamiento
                                    </p>

                                    <span
                                        class="rounded-full bg-[#f6ded9] px-3 py-1 text-sm font-extrabold text-[#a93424]">
                                        3
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-[#7a625d]">
                                    Actualiza el estado médico antes de publicarlos.
                                </p>
                            </div>

                            <div class="rounded-2xl border border-[#f0e1dd] bg-white p-5">
                                <div class="flex items-center justify-between">
                                    <p class="font-extrabold text-[#3d302d]">
                                        Perfiles incompletos
                                    </p>

                                    <span
                                        class="rounded-full bg-[#eee9e7] px-3 py-1 text-sm font-extrabold text-[#655551]">
                                        5
                                    </span>
                                </div>

                                <p class="mt-2 text-sm text-[#7a625d]">
                                    Faltan fotos, edad o descripción en algunos perfiles.
                                </p>
                            </div>
                        </div>

                        <div class="mt-7 rounded-2xl bg-[#aa3a2a] p-6 text-white shadow-lg shadow-red-900/20">

                            <h4 class="mt-2 text-2xl font-black">
                                Revisa solicitudes pendientes
                            </h4>

                            <p class="mt-2 text-sm leading-6 text-white/80">
                                Hay solicitudes nuevas esperando respuesta. No dejes a los lomitos en visto, eso sí
                                cala.
                            </p>

                            <a href="#"
                                class="mt-5 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                                Ir a solicitudes
                            </a>
                        </div>
                    </aside>

                </div>
            </section>

        </main>
    </div>

</body>

</html>
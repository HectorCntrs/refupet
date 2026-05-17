<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Perro | RefuPet Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body class="min-h-screen bg-[#fbf8f7] font-['Nunito'] text-[#2d1c18]">

    <div class="flex min-h-screen">

        <x-admin-sidebar />

        <main class="w-full px-5 py-8 lg:ml-[285px] lg:px-11 lg:py-12">

            <div class="mb-8">
                <a href="{{ route('admin.dogs.index') }}" class="text-sm font-extrabold text-[#a93424] hover:underline">
                    ← Volver a gestión de perros
                </a>

                <h1 class="mt-4 text-4xl font-black tracking-tight text-[#14100f] md:text-5xl">
                    Agregar Perro
                </h1>

                <p class="mt-3 text-lg text-[#4f3f3c]">
                    Registra un nuevo perro disponible en el refugio.
                </p>
            </div>

            <section class="max-w-3xl rounded-2xl border border-[#ecd9d4] bg-white p-7 shadow-sm">

                @if ($errors->any())
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('admin.dogs.form', [
                    'dog' => null,
                    'action' => route('admin.dogs.store'),
                    'method' => 'POST',
                    'buttonText' => 'Guardar Perro',
                ])
       
     </
section>

        </main>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RefuPet</title>



    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

    <header class="navbar">
        <div class="logo">RefuPet</div>

        <nav class="nav-links">
            <a href="#" class="active">Home</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Encuentra a tu<br>nuevo mejor amigo</h1>

                <p>
                    En RefuPet, nos dedicamos a conectar perros increíbles con familias
                    amorosas. Descubre la alegría de adoptar y transforma una vida hoy.
                </p>

                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary large">Ver perros disponibles</a>
                    <a href="#" class="btn btn-outline large">Iniciar sesión</a>
                </div>
            </div>

            <div class="hero-image">
                <img src="{{ asset('images/perro-main.jpg') }}" alt="Perro en adopción">
            </div>
        </section>

        <section class="mission">
            <div class="section-header">
                <h2>Nuestra Misión</h2>
                <p>
                    Creemos que cada perro merece un hogar seguro y lleno de amor.
                    Trabajamos incansablemente para hacerlo realidad.
                </p>
            </div>

            <div class="cards">
                <article class="card">
                    <div class="icon pink">✚</div>
                    <h3>Cuidado Médico</h3>
                    <p>
                        Aseguramos que cada perro reciba la atención veterinaria necesaria,
                        vacunas y tratamientos antes de la adopción.
                    </p>
                </article>

                <article class="card">
                    <div class="icon yellow">♡</div>
                    <h3>Rehabilitación con Amor</h3>
                    <p>
                        Proporcionamos un entorno seguro y afectuoso para ayudar a los perros
                        a superar traumas pasados y socializar.
                    </p>
                </article>

                <article class="card">
                    <div class="icon green">⌂</div>
                    <h3>Adopción Responsable</h3>
                    <p>
                        Evaluamos cuidadosamente a las familias para asegurar un vínculo fuerte
                        y duradero entre el perro y su nuevo hogar.
                    </p>
                </article>
            </div>
        </section>
    </main>
    <section class="available-preview">
        <div class="preview-header">
            <div>
                <h2>Perros disponibles</h2>
                <p>
                    Conoce algunos de los perros que están esperando una familia amorosa.
                </p>
            </div>

            <a href="{{ route('dogs.index') }}" class="btn btn-outline">
                Ver todos
            </a>
        </div>

        @if ($dogs->isEmpty())
            <div class="empty-dogs">
                <h3>Todavía no hay perros disponibles</h3>
                <p>Cuando el admin registre perros disponibles, aparecerán aquí.</p>
            </div>
        @else
            <div class="preview-dogs-grid">
                @foreach ($dogs as $dog)
                    <article class="preview-dog-card">
                        <div class="preview-dog-image">
                            @if ($dog->photo)
                                <img src="{{ asset('storage/' . $dog->photo) }}" alt="{{ $dog->name }}">
                            @else
                                <div class="dog-placeholder">
                                    🐶
                                </div>
                            @endif

                            <span class="dog-status">
                                {{ $dog->status }}
                            </span>
                        </div>

                        <div class="preview-dog-content">
                            <div class="dog-title-row">
                                <h3>{{ $dog->name }}</h3>

                                <span>
                                    {{ $dog->sex }}
                                </span>
                            </div>

                            <div class="dog-meta">
                                <span>📅 {{ $dog->age }}</span>
                                <span>🐾 {{ $dog->breed }}</span>
                            </div>

                            @if ($dog->description)
                                <p>
                                    {{ Str::limit($dog->description, 90) }}
                                </p>
                            @endif

                            <div class="dog-actions">
                                <a href="{{ route('dogs.show', $dog) }}" class="btn btn-outline">
                                    Ver perfil
                                </a>

                                <a href="{{ route('dogs.show', $dog) }}" class="btn btn-primary">
                                    Adoptar
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
    <x-footer />

</body>

</html>
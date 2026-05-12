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
            <a href="#">Available Dogs</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
            <a href="#" class="btn btn-primary">Register</a>
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

    <footer class="footer">
        <div>
            <h4>RefuPet</h4>
            <p>© 2024 RefuPet. Spreading joy, one<br>adoption at a time.</p>
        </div>

        <div class="footer-links">
            <a href="#">Contact Us</a>
            <a href="#">Our Mission</a>
            <a href="#">Success Stories</a>
            <a href="#">Privacy Policy</a>
        </div>
    </footer>

</body>

</html>
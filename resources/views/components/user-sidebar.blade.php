<aside
    class="fixed left-0 top-0 hidden h-screen w-[285px] flex-col border-r border-[#efe2df] bg-white/90 px-4 py-5 shadow-xl shadow-stone-900/5 lg:flex">

    <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 text-2xl font-extrabold text-[#a93424]">
        <span>🐾</span>
        <span>RefuPet</span>
    </a>

    <div class="mt-8 flex items-center gap-3 rounded-2xl bg-[#fff7f5] px-4 py-4">
        <a href="{{ route('user.profile') }}"
            class="mt-1 flex items-center gap-3 rounded-xl bg-[#fff7f5] px-3 py-2.5 transition hover:bg-[#fff1ee]">

            <div
                class="flex h-11 w-11 shrink-0 items-center justify-center overflow-hidden rounded-full bg-[#ffdcd6] text-sm font-black text-[#a93424]">
                @if (auth()->user()->profile_photo)
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="{{ auth()->user()->name }}"
                        class="h-full w-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>

            <div class="min-w-0">
                <p class="truncate text-sm font-extrabold text-[#14100f]">
                    {{ auth()->user()->name }}
                </p>

                <p class="truncate text-xs text-[#6d5651]">
                    Usuario
                </p>
            </div>
        </a>
    </div>

    <nav class="mt-10 space-y-3">
        <a href="{{ route('dashboard') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('dashboard'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('dashboard'),
        ])>
            <span class="text-2xl">▦</span>
            Dashboard
        </a>

        <a href="{{ route('dogs.index') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('dogs.*'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('dogs.*'),
        ])>
            <span class="text-2xl">🐾</span>
            Perros disponibles
        </a>

        <a href="{{ route('user.adoption-requests') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('user.adoption-requests'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('user.adoption-requests'),
        ])>
            <span class="text-2xl">▣</span>
            Solicitudes de adopción
        </a>

        <a href="{{ route('user.profile') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('user.profile'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('user.profile'),
        ])>
            <span class="text-2xl">👤</span>
            Mi perfil
        </a>
    </nav>

    <div class="mt-auto space-y-3 border-t border-[#efe2df] pt-5">
        <a href="{{ route('dogs.index') }}"
            class="flex w-full items-center justify-center gap-3 rounded-2xl bg-[#aa3a2a] px-5 py-4 text-base font-extrabold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922f22]">
            <span class="text-2xl">＋</span>
            Ver perros
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="flex w-full items-center justify-center gap-3 rounded-2xl border border-[#deb9b1] bg-white px-5 py-4 text-base font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
                <span class="text-xl">↩</span>
                Cerrar sesión
            </button>
        </form>
    </div>
</aside>
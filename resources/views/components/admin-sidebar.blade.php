<aside
    class="fixed left-0 top-0 hidden h-screen w-[285px] flex-col border-r border-[#efe2df] bg-white/85 px-4 py-5 shadow-xl shadow-stone-900/5 lg:flex">

    <div class="flex items-center gap-3 px-3">
        <div
            class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-full bg-[#b34531] text-xl text-white">
            👨🏻‍💼
        </div>

        <div>
            <h2 class="text-lg font-extrabold text-[#a93424]">
                RefuPet Admin
            </h2>
            <p class="text-sm text-[#6d5651]">
                Shelter Management
            </p>
        </div>
    </div>

    <nav class="mt-14 space-y-3">
        <a href="{{ route('admin.dashboard') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('admin.dashboard'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('admin.dashboard'),
        ])>
    <span class="text-2xl">▦</span>
            Dashboard
        </a>

        <a href="{{ route('admin.dogs.index') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('admin.dogs.*'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('admin.dogs.*'),
        ])>
            <span class="text-2xl">🐾</span>
            Manage Dogs
        </a>

        <a href="#"
            class="flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold text-[#4d342f] transition hover:bg-[#fff1ee]">
            <span class="text-2xl">▵</span>
            Breeds
        </a>

        <a href="{{ route('admin.adoption-requests.index') }}" @class([
            'flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold transition',
            'bg-[#e76f5a] text-[#4d1f18] shadow-sm' => request()->routeIs('admin.adoption-requests.*'),
            'text-[#4d342f] hover:bg-[#fff1ee]' => !request()->routeIs('admin.adoption-requests.*'),
        ])>
    <span class="text-2xl">▣</span>
            Adoption Requests
        </a>

        <a href="#"
            class="flex items-center gap-4 rounded-2xl px-5 py-4 text-base font-bold text-[#4d342f] transition hover:bg-[#fff1ee]">
            <span class="text-2xl">▤</span>
            Reports
        </a>
    </nav>

    <div class="mt-auto space-y-3 border-t border-[#efe2df] pt-5">
        <a href="{{ route('admin.dogs.create') }}"
            class="flex w-full items-center justify-center gap-3 rounded-2xl bg-[#aa3a2a] px-5 py-4 text-base font-extrabold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922f22]">
            <span class="text-2xl">＋</span>
            Add New Dog
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
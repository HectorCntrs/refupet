<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-5">
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    <div>
        <label for="name" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
            Nombre
        </label>

        <input type="text" id="name" name="name" value="{{ old('name', $dog->name ?? '') }}" required
            class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="age" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
                Edad
            </label>

            <input type="text" id="age" name="age" value="{{ old('age', $dog->age ?? '') }}"
                placeholder="Ej. 2 años, 8 meses" required
                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
        </div>

        <div>
            <label for="breed" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
                Raza
            </label>

            <input type="text" id="breed" name="breed" value="{{ old('breed', $dog->breed ?? '') }}"
                placeholder="Ej. Beagle Mix" required
                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
        </div>
    </div>

    <div class="grid gap-5 md:grid-cols-2">
        <div>
            <label for="sex" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
                Sexo
            </label>

            <select id="sex" name="sex" required
                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                <option value="">Selecciona</option>
                <option value="Macho" @selected(old('sex', $dog->sex ?? '') === 'Macho')>Macho</option>
                <option value="Hembra" @selected(old('sex', $dog->sex ?? '') === 'Hembra')>Hembra</option>
            </select>
        </div>

        <div>
            <label for="status" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
                Estado
            </label>

            <select id="status" name="status" required
                class="h-14 w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">
                <option value="Disponible" @selected(old('status', $dog->status ?? 'Disponible') === 'Disponible')>
                    Disponible
                </option>

                <option value="En Tratamiento" @selected(old('status', $dog->status ?? '') === 'En Tratamiento')>
                    En Tratamiento
                </option>

                <option value="Adoptado" @selected(old('status', $dog->status ?? '') === 'Adoptado')>
                    Adoptado
                </option>
            </select>
        </div>
    </div>

    <div>
        <label for="photo" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
            Foto
        </label>

        @if (!empty($dog?->photo))
            <div class="mb-3 flex items-center gap-4 rounded-xl border border-[#efe2df] bg-[#fffdfc] p-3">
                <img src="{{ asset('storage/' . $dog->photo) }}" alt="{{ $dog->name }}"
                    class="h-20 w-20 rounded-xl object-cover">

                <div>
                    <p class="text-sm font-extrabold text-[#3d302d]">
                        Foto actual
                    </p>
                    <p class="text-sm text-[#7a625d]">
                        Si subes otra imagen, se reemplazará.
                    </p>
                </div>
            </div>
        @endif

        <input type="file" id="photo" name="photo" accept="image/*"
            class="w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-[#aa3a2a] file:px-4 file:py-2 file:font-extrabold file:text-white hover:file:bg-[#922f22]">
    </div>

    <div>
        <label for="description" class="mb-2 block text-sm font-extrabold text-[#3d302d]">
            Descripción
        </label>

        <textarea id="description" name="description" rows="4"
            class="w-full rounded-xl border border-[#deb9b1] bg-[#fffdfc] px-4 py-3 text-lg outline-none focus:border-[#aa3a2a] focus:ring-4 focus:ring-[#aa3a2a]/10">{{ old('description', $dog->description ?? '') }}</textarea>
    </div>

    <div class="flex flex-col gap-3 pt-3 sm:flex-row sm:justify-end">
        <a href="{{ route('admin.dogs.index') }}"
            class="inline-flex h-14 items-center justify-center rounded-xl border border-[#deb9b1] px-6 text-sm font-extrabold text-[#a93424] transition hover:bg-[#fff1ee]">
            Cancelar
        </a>

        <button type="submit"
            class="inline-flex h-14 items-center justify-center rounded-xl bg-[#aa3a2a] px-8 text-sm font-extrabold text-white shadow-lg shadow-red-900/15 transition hover:bg-[#922f22]">
            {{ $buttonText }}
        </button>
    </div>
</form>
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;


class DogController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(auth()->user()?->is_admin, 403);
    }

    public function index()
    {
        $this->authorizeAdmin();

        $dogs = Dog::latest()->paginate(10);

        return view('admin.dogs.index', compact('dogs'));
    }

    public function create()
    {
        $this->authorizeAdmin();

        return view('admin.dogs.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:100'],
            'breed' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'in:Macho,Hembra'],
            'status' => ['required', 'in:Disponible,En Tratamiento,Adoptado'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('dogs', 'public');
        }

        Dog::create($validated);

        return redirect()
            ->route('admin.dogs.index')
            ->with('success', 'Perro agregado correctamente.');
    }

    public function destroy(Dog $dog)
    {
        $this->authorizeAdmin();

        $dog->delete();

        return redirect()
            ->route('admin.dogs.index')
            ->with('success', 'Perro eliminado correctamente.');
    }

    public function edit(Dog $dog)
    {
        $this->authorizeAdmin();

        return view('admin.dogs.edit', compact('dog'));
    }

    public function update(Request $request, Dog $dog)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:100'],
            'breed' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'in:Macho,Hembra'],
            'status' => ['required', 'in:Disponible,En Tratamiento,Adoptado'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('dogs', 'public');
        }

        $dog->update($validated);

        return redirect()
            ->route('admin.dogs.index')
            ->with('success', 'Perro actualizado correctamente.');
    }
}
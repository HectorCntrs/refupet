<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\Dog;
use Illuminate\Http\Request;

class AdoptionRequestController extends Controller
{
    public function store(Request $request, Dog $dog)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'reason' => ['required', 'string', 'min:10'],
            'experience' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
        ]);

        AdoptionRequest::create([
            'dog_id' => $dog->id,
            'user_id' => auth()->id(),
            'name' => auth()->user()->name,
            'email' => $validated['email'],
            'reason' => $validated['reason'],
            'experience' => $validated['experience'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'status' => 'Pendiente',
        ]);

        return redirect()
            ->route('dogs.show', $dog)
            ->with('success', 'Tu solicitud de adopción fue enviada correctamente.');
    }
}
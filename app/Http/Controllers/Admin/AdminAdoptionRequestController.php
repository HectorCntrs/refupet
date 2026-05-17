<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

class AdminAdoptionRequestController extends Controller
{
    private function authorizeAdmin(): void
    {
        abort_unless(auth()->user()?->is_admin, 403);
    }

    public function index(Request $request)
    {
        $this->authorizeAdmin();

        $search = $request->query('search');

        $requests = AdoptionRequest::with(['dog', 'user'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('dog', function ($dogQuery) use ($search) {
                        $dogQuery->where('name', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.adoption-requests.index', compact('requests', 'search'));
    }

    public function approve(AdoptionRequest $adoptionRequest)
    {
        $this->authorizeAdmin();

        $adoptionRequest->update([
            'status' => 'Aprobada',
        ]);

        return redirect()
            ->route('admin.adoption-requests.index')
            ->with('success', 'Solicitud aprobada correctamente.');
    }

    public function reject(AdoptionRequest $adoptionRequest)
    {
        $this->authorizeAdmin();

        $adoptionRequest->update([
            'status' => 'Rechazada',
        ]);

        return redirect()
            ->route('admin.adoption-requests.index')
            ->with('success', 'Solicitud rechazada correctamente.');
    }
}
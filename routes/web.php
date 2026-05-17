<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DogController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\Admin\AdminAdoptionRequestController;
use App\Models\Dog;
use App\Models\AdoptionRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    $dogs = Dog::where('status', 'Disponible')
        ->latest()
        ->take(3)
        ->get();

    return view('welcome', compact('dogs'));
})->name('home');

Route::get('/dogs', function () {
    $dogs = Dog::latest()->paginate(6);

    return view('dogs.index', compact('dogs'));
})->name('dogs.index');

Route::get('/dogs/{dog}', function (Dog $dog) {
    return view('dogs.show', compact('dog'));
})->name('dogs.show');

Route::post('/dogs/{dog}/adoption-request', [AdoptionRequestController::class, 'store'])
    ->middleware('auth')
    ->name('adoption-requests.store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', function () {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        $dogs = Dog::latest()->take(4)->get();

        return view('user.dashboard', compact('dogs'));
    })->name('dashboard');

    Route::get('/my-adoption-requests', function () {
        $requests = AdoptionRequest::with('dog')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.adoption-requests', compact('requests'));
    })->name('user.adoption-requests');

    Route::get('/my-profile', function () {
        return view('user.profile');
    })->name('user.profile');

    Route::patch('/my-profile', function (Request $request) {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'current_password'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        unset($validated['current_password']);

        $user->update($validated);

        return redirect()
            ->route('user.profile')
            ->with('success', 'Perfil actualizado correctamente.');
    })->name('user.profile.update');
});

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->is_admin, 403);

            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/dogs', [DogController::class, 'index'])->name('dogs.index');
        Route::get('/dogs/create', [DogController::class, 'create'])->name('dogs.create');
        Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');
        Route::get('/dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
        Route::put('/dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
        Route::delete('/dogs/{dog}', [DogController::class, 'destroy'])->name('dogs.destroy');

        Route::get('/adoption-requests', [AdminAdoptionRequestController::class, 'index'])
            ->name('adoption-requests.index');

        Route::patch('/adoption-requests/{adoptionRequest}/approve', [AdminAdoptionRequestController::class, 'approve'])
            ->name('adoption-requests.approve');

        Route::patch('/adoption-requests/{adoptionRequest}/reject', [AdminAdoptionRequestController::class, 'reject'])
            ->name('adoption-requests.reject');
    });

require __DIR__ . '/settings.php';
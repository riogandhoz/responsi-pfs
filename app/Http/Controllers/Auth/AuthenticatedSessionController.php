<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return $this->authenticated($request, Auth::user()) 
    //         ?: redirect()->intended(RouteServiceProvider::HOME);
    // }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Redirect based on user role
        if (Auth::user()->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Redirect users after login based on their role.
     */
    protected function authenticated(Request $request, $user)
    {
    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     }

    //     return redirect()->intended(RouteServiceProvider::HOME);
    }
}

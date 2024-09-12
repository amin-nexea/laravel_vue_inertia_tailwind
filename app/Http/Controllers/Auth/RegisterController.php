<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    public function store(RegisterRequest $request)
    {
        try {
            $user = $this->userService->create($request->validated());
            Auth::login($user);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred during registration. Please try again.']);
        }
    }
}
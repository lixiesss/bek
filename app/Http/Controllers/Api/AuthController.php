<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Redirect to Google OAuth for public users/participants
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->with(['state' => 'user'])
            ->redirect();
    }

    /**
     * Redirect to Google OAuth for admins
     */
    public function redirectToGoogleAdmin()
    {
        return Socialite::driver('google')
            ->stateless()
            ->with(['state' => 'admin'])
            ->redirect();
    }

    /**
     * Handle Google OAuth callback for both users and admins
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $email = $googleUser->email;
            $name = $googleUser->name;

            $state = $request->get('state', 'user');

            if ($state === 'admin') {
                return $this->handleAdminLogin($email, $name);
            } else {
                return $this->handleUserLogin($email, $name);
            }

        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            $frontendUrl = env('FRONTEND_URL', 'http://localhost:4321');
            return redirect($frontendUrl . '?error=' . urlencode('Authentication failed'));
        }
    }

    /**
     * Handle public user login logic
     */
    private function handleUserLogin($email, $name)
    {
        // Langsung simpan/update user tanpa filter domain email
        $user = User::updateOrCreate(
            ['email' => $email],
            ['name' => $name]
        );

        $expiresAt = now()->addMinutes(config('sanctum.expiration'));
        $token = $user->createToken('user-token', ['*'], $expiresAt)->plainTextToken;

        $frontendUrl = env('FRONTEND_URL', 'http://localhost:4321');
        return redirect($frontendUrl . '?login=success&token=' . $token);
    }

    /**
     * Handle admin login logic
     */
    private function handleAdminLogin($email, $name)
    {
        $admin = \App\Models\Admin::where('email', $email)->first();

        if (!$admin || !$admin->is_admin) {
            $frontendUrl = env('FRONTEND_URL', 'http://localhost:4321');
            return redirect($frontendUrl . '/login?error=' . urlencode('Unauthorized Admin Access'));
        }

        $expiresAt = now()->addHours(12);
        $token = $admin->createToken('admin-token', ['*'], $expiresAt)->plainTextToken;
        $frontendUrl = env('FRONTEND_URL', 'http://localhost:4321');
        return redirect($frontendUrl . '/admin?login=success&admin_token=' . $token);
    }

    /**
     * Get authenticated user data
     */
    public function user(Request $request)
    {
        $user = $request->user();
        $role = $user instanceof Admin ? 'admin' : 'user';

        return response()->json([
            'success' => true,
            'data' => array_merge($user->toArray(), ['role' => $role])
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Logout successful'
            ]);

        } catch (\Exception $e) {
            Log::error('Logout Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Logout failed'
            ], 500);
        }
    }
}

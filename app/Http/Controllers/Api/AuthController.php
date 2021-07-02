<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Generates an api token
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request) {
        // Get login credentials from request
        $credentials = $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        // Check credentials by attempting to login
        if (! Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorised',
                'message' => 'The login credentials provided are not valid.'
            ], JsonResponse::HTTP_UNAUTHORIZED);
        }
        // Generate new api token
        $token = auth()->user()->createToken('API token', ['all']);
        // Return token as plain text
        return response()->json([
            'token' => $token->plainTextToken
        ]);
    }

    /**
     * Revokes the user's current access token
     * @return JsonResponse
     */
    public function logout() {
        auth()->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Token revoked']);
    }
}

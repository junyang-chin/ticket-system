<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    /**
     * @param LoginAuthRequest $request
     * @return Response
     */
    public function login(LoginAuthRequest $request)
    {
        // check user exists, double checked in request too
        $user = User::where('email', $request['email'])->first();
        // if user exists and password hash matches
        if ($user && Hash::check($request['password'], $user->password)) {
            // generate token
            $token = $user->createToken('ApiToken')->plainTextToken;
            return response()->json(['data' => ['name' => $user->name, 'role' => $user->getRoleNames(), 'token' => $token]], 200);
        }
    }


    /**
     * @param logoutAuthRequest $request
     * @return Response
     */
    public function logout(Request $request)
    {
        // delete all tokens associated to the authenticated user(logout from all sessions)
        Auth::user()->tokens()->delete();
        return response(null, 205);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AccessTokensController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'mobile' => ['required'],
            'device_name' => ['required'],
        ]);

        $user = User::where('mobile', $request->mobile)->first();
        
        $lastuserid = User::latest()->first();
        if (!$user) {

            User::create([
                'name'=> 'guest' . ($lastuserid->id  ?? 0) + 1  ,
                'mobile'=> $request->mobile ,
            ]);
            $user =  User::where('mobile', $request->mobile)->first();
            // return Response()->json([
            //     'message' => 'Invalid mobile combination'
            // ], 401);
        }
        $abilities = $request->input('abilities', ['*']);
        if ($abilities && is_string($abilities)) {
            $abilities = explode(',', $abilities);
        }
        
        $token = $user->createToken($request->device_name, $abilities, $request->ip());
        $accessToken = PersonalAccessToken::findToken($token->plainTextToken);
        // $accessToken = $user->tokens()->latest()->first();
        // $accessToken->forceFill([
        //     'ip' => $request->ip(),
        // ])->save();
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'login successfully',
            'user' => $user->setAttribute('token', $token->plainTextToken),

        ], 200);
    }

    public function destroy()
    {
        $user = Auth::guard('sanctum')->user();

        //Rovoke (delete) all users tokens
        //$user->tokens()->delete();

        //Revoke current access Token
        $user->currentAccessToken()->delete();
    }
}

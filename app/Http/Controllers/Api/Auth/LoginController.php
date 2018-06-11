<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Auth\LoginController as Controller;

class LoginController extends Controller
{
    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\UserResource
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $user = $this->guard()->user();


        if ($user) {
            return (new UserResource($user))->additional([
                'token' => $user->createToken('Unkown')->accessToken,
            ]);
        }

        $this->sendFailedLoginResponse($request);
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Support\ResetPassword;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ResetPasswordController extends Controller
{
    /**
     * @var ResetPassword
     */
    private $resetPassword;

    /**
     * ResetPasswordController constructor.
     * @param ResetPassword $resetPassword
     */
    public function __construct(ResetPassword $resetPassword)
    {
        $this->resetPassword = $resetPassword;
    }

    /**
     * reset a new password.
     *
     * @param Request $request
     * @return \App\Http\Resources\UserResource
     */
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required|string',
            'password' => 'required|min:6|max:255',
        ]);

        // Check the token and remove it.
        $user = $this->resetPassword->checkToken($request->token);

        if (! $user) {
            return response([
                'errors' => [
                    'code' => [trans('passwords.reset.wrong-token')],
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user->password = bcrypt($request->password);

        $user->save();

        return $this->generateToken($user);
    }

    /**
     * To generate login token.
     *
     * @param \App\Models\User $user
     * @return UserResource
     */
    public function generateToken($user)
    {
        $tokenResult = $user->createToken(
            request()->input('device', 'Unkown device'),
            ['*']
        );

        return (new UserResource($user))->additional([
            'token' => $tokenResult->accessToken,
        ]);
    }
}

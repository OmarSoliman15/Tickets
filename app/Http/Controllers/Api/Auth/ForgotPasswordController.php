<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Notifications\ForgetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Support\ResetPassword;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    /**
     * @var
     */
    private $resetPassword;

    /**
     * ForgotPasswordController constructor.
     * @param $resetPassword $resetPassword
     */
    public function __construct(ResetPassword $resetPassword)
    {
        $this->resetPassword = $resetPassword;
    }

    /**
     * Send code to mobile.
     *
     * @param Request $request
     * @return null|array
     */
    public function sendCode(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $code = $this->resetPassword->createVerificationCode($request->email);

        // check if email verified
        if (! $code) {
            return response([
                'errors' => [
                    'code' => [trans('auth.not_active')],
                ],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::whereEmail($request->email)->firstOrFail();

        $user->notify(new ForgetPasswordNotification($code));

        return [
            'check-the-code' => route('api.auth.verifyCode'),
        ];
    }

    /**
     * Check the code.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function verifyCode(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'code' => 'required|min:6|max:6',
        ]);
        $token = $this->resetPassword->checkCode($request->email, $request->code);
        // No token has returned
        if (! $token) {
            return response([
                'errors' => [
                    'code' => [trans('passwords.reset.wrong-code')],
                ],
            ], Response::HTTP_UNAUTHORIZED);
        }

        return [
            'token' => $token,
        ];
    }
}

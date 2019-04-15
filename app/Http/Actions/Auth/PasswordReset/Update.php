<?php

namespace App\Http\Actions\Auth\PasswordReset;

use Illuminate\Http\Request;
use PerfectOblivion\Actions\Action;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\ResetsPasswords;

class Update extends Action
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return Password::PASSWORD_RESET == $response
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     *
     * @return \Illuminate\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return Response::json([
            'message' => trans($response),
        ], 200);
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return Response::json([
            'email' => $request->only('email'),
            'errors' => [
                'token' => trans($response),
            ],
        ], 422);
    }
}

<?php

namespace App\Http\Actions\Auth\PasswordResetRequest;

use Illuminate\Http\Request;
use PerfectOblivion\Actions\Action;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class SendEmail extends Action
{
    use SendsPasswordResetEmails;

    /**
     * Execute the action.
     */
    public function __invoke(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return Password::RESET_LINK_SENT == $response
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkResponse(Request $request, $response)
    {
        return Response::json([
            'message' => trans($response),
        ]);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     *
     * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return Response::json([
            'email' => $request->only('email'),
            'errors' => [
                'email' => trans($response),
            ],
        ]);
    }
}

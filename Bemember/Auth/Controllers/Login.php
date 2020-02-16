<?php

namespace Bemember\Auth\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Bemember\Core\Controllers\Controller;
use Bemember\User\Models\User;

class Login extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function __invoke(Request $request): Response
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user || !\Hash::check($request->get('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response(['token' => $user->createToken('Bemember Token')->plainTextToken]);
    }
}

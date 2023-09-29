<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AuthenticateTeacher extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    //  This middleware is being used for Teacher Login Check
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('teacher.index');
    }
}

<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Auth;
use Error;

class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {

        $guard = Auth::guard(config('sanctum.guard', 'web'));

        if( ! $guard->attempt($args)) {
            throw new Error('Invalid credentials.');
        }

        $user = $guard->user();
        $token=$user->createToken("login");
        $user->api_token = $token->plainTextToken;
        $user->save();
        return $user;
    }


}

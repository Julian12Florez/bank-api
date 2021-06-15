<?php

namespace App\GraphQL\Mutations;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        $guard = Auth::guard(config('sanctum.guard', 'web'));

        $user = User::find($args["id"]);
        $guard->user();
        $user->tokens()->delete();
        $user->api_token=null;
        $user->save();
        $guard->logout();

        return $user;
    }
}

<?php

namespace App\GraphQL\Queries;
use App\Models\Account;

class ClientAccounts
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $accounts = Account::whereHas('user', function ($query) use($args) {
            $query->where('identity_number', $args["identity_number"]);
        })->get();

        return $accounts;
    }
}

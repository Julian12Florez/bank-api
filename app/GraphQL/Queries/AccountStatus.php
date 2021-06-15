<?php

namespace App\GraphQL\Queries;
use App\Models\Account;

class AccountStatus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $account = Account::where('number',intval($args["number"]))->get();
        return $account;
    }
}

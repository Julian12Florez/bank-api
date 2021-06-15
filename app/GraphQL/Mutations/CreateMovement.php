<?php

namespace App\GraphQL\Mutations;
use App\Models\Account;
use App\Models\Movement;

class CreateMovement
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        try {

            $movement_saved = $this->updateBalanceOriginAccount($args);
            $this->updateBalanceDestinationAccount($args);
            return $movement_saved;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateBalanceOriginAccount(array $args)
    {
        $account_origin= Account::find($args["origin_account"]);
        $account_origin->balance = $account_origin->balance - $args["value"];

        $movement_saved = $account_origin->movements()->create([
            'value' => $args["value"],
            'account_id' => $args["origin_account"],
            'type_movement' => 1 //"movimiento de salida"
        ]);

       $account_origin->save();
      return $movement_saved;
    }

    public function updateBalanceDestinationAccount(array $args)
    {
        $account_destination= Account::find($args["destination_account"]);
        $account_destination->balance =$account_destination->balance + $args["value"];

        $account_destination->movements()->create([
            'value' => $args["value"],
            'account_id' => $args["destination_account"],
            'type_movement' => 2 //"movimiento de entrada"
        ]);

        $account_destination->save();
    }
}

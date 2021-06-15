<?php

namespace App\GraphQL\Validators\Mutation;

use Nuwave\Lighthouse\Validation\Validator;
use App\Models\Account;

class CreateMovementValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        $account_origin = Account::find($this->arg("origin_account"));
        $balance=$account_origin->balance;

        return [
            'origin_account'=> [
                'required'
            ],
            'destination_account'=> [
                'required'
            ],
            'value'=> [
                'required',
                'int',
                "lt:$balance",
            ],
        ];
    }


    public function messages(): array
    {
        return [
            'origin_account.required' => 'Por favor seleccione la cuenta de origen.',
            'destination_account.required' => 'Por favor seleccione la cuenta de destino.',
            'value.required' => 'Por favor digite el valor a transferir.',
            'value.lt' => 'El saldo disponible no es suficiente para realizar la transferencia.',
        ];
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValorEmprestimo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        if(!empty($value))
            return true;
        else
            return false;
    }

    public function message()
    {
        return 'O parâmetro valor empréstimo é obrigatório!';
    }
}

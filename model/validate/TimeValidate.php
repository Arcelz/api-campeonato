<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/09/2017
 * Time: 00:10
 */
namespace model\validate;


use Valitron\Validator;

class TimeValidate implements IValidate
{

    public function validatePost($params)
    {
        $v = new Validator($params);
        $rules = [
            'required',
            ['lengthMax', 25]
        ];
        $v->mapFieldRules(['nome', 'jogador1', 'jogador2', 'jogador3', 'jogador4','jogador5'],$rules);
        if ($v->validate()) {
            return true;
        } else {
            $data = "";
            foreach ($v->errors() as $key => $value) {
                $data .= implode(',', $value);
            }
            return ["codigo" => 401,
                "mensagem" => $data];
        }
    }

    public function validateGet($params)
    {
        // TODO: Implement validateGet() method.
    }

    public function validatePut($params)
    {
        // TODO: Implement validatePut() method.
    }

    public function validateDelete($params)
    {
        // TODO: Implement validateDelete() method.
    }
}
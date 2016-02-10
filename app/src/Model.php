<?php
namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Valitron\Validator;

class Model extends Eloquent
{
    protected $error;
    protected $rules = [];

    public function validate($data)
    {
        $v = new Validator($data);
        $v->rules($this->rules);
        
        return $v->validate();
    }
}
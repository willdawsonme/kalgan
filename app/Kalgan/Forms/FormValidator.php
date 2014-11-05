<?php namespace Kalgan\Forms;

use Validator;
use Kalgan\Exceptions\FormValidationException;

abstract class FormValidator {

    protected $validation;

    protected $rules;

    protected $messages;

    public function validate($data)
    {
        $this->validation = Validator::make($data, $this->getPreparedRules(), $this->getMessages());

        if ($this->validation->fails())
        {
            throw new FormValidationException('Validation failed', $this->getErrors());
        }

        return true;
    }

    public function getPreparedRules()
    {
        return $this->rules;
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getErrors()
    {
        return $this->validation->errors();
    }

}

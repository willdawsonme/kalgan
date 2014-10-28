<?php namespace Kalgan\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    /**
     * Validation rules for the sign in form.
     *
     * @var array
     */
    protected $rules = [
        'uts_id'   => 'required',
        'password' => 'required'
    ];

}
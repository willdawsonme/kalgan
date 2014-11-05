<?php namespace Kalgan\Validators;

class Validator extends \Illuminate\Validation\Validator {

    /**
     * Validate the field is not before the specified date.
     */
    public function validateNotBefore($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'not_before');

        if ( ! ($date = strtotime($parameters[0])))
        {
            return strtotime($value) >= strtotime($this->getValue($parameters[0]));
        }

        return strtotime($value) >= $date;
    }

}

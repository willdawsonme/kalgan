<?php namespace Kalgan\Providers;

use Kalgan\Validators\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

    /**
     * Unused but required.
     */
    public function register() {}

    /**
     * Register the custom validator class.
     *
     * @return Validator
     */
    public function boot()
    {
        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
            return new Validator($translator, $data, $rules, $messages);
        });
    }

}

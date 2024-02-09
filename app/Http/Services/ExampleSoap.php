<?php

namespace App\Http\Services;

/**
 * Class ExampleSoap
 *
 * This class represents an example SOAP service.
 */
class ExampleSoap
{


    /**
     * Retrieves a greeting message with the provided name.
     *
     * @param  string  $myName  The name to be included in the greeting.
     *
     * @return string The greeting message with the provided name.
     */
    public function exampleHello(string $myName): string
    {
        return "My name is ".$myName;
    }
}

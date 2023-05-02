<?php

namespace App\Exceptions;

use Exception;

class RideException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        // ...
    }
 
    /**
     * Render the exception into an HTTP response.
     */
    public function render(Request $request): Response
    {
        return view();
    }
}
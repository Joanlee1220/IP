<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $exception)
    // {

    //     if ($exception instanceof HttpExceptionInterface) {
    //         if ($exception->getStatusCode() == 401) {
    //             return redirect()->route('401');
    //         } 
    //         if ($exception->getStatusCode() == 404) {
    //             return redirect()->route('404');
    //         }
    //         if ($exception->getStatusCode() == 500) {
    //             return redirect()->route('500');
    //         }
    //         if ($exception->getStatusCode() == 502) {
    //             return redirect()->route('502');
    //         }
    //     } else {
    //         return parent::render($request, $exception);
    //     }
    // }
}

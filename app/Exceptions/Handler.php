<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ThrottleRequestsException) {
            return back()->with('status', 'verification-email-throttled')
                ->with('message', 'Please wait before requesting another verification email.');
        }

        return parent::render($request, $exception);
    }
}
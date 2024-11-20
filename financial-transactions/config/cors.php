<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Define the origins that are allowed to send CORS requests.
    |
    */

    'allowed_origins' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Define the HTTP methods allowed when accessing the resource.
    |
    */

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Define the headers allowed when making the request.
    |
    */

    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Expose Headers
    |--------------------------------------------------------------------------
    |
    | Define the headers that can be exposed to the browser.
    |
    */

    'exposed_headers' => false,

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Define the maximum time, in seconds, the results of a preflight request
    | can be cached by the browser.
    |
    */

    'max_age' => 0,
];

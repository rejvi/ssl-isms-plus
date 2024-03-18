<?php
return [
    /*
    |--------------------------------------------------------------------------
    | API Domain
    |--------------------------------------------------------------------------
    |
    | This is the API domain. Example: https://api.isms.com
    |
    */
    "api_domain" => env('SMS_PLUS_API_DOMAIN',"http://ismsapi.publicdemo.xyz"),
    /*
   |--------------------------------------------------------------------------
   | API Token
   |--------------------------------------------------------------------------
   |
   | This is the API authentication token that is provided by SSL.
   |
   */

    "api_token" => env('SMS_PLUS_API_TOKEN',""),
    /*
    |--------------------------------------------------------------------------
    | Stakeholder ID
    |--------------------------------------------------------------------------
    |
    | This is the stakeholder ID that is provided by SSL.
    |
    */
    "sid" => env('SMS_PLUS_SID',"")
];

<?php

use App\Http\Controllers\Api\ExampleApiController;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(['prefix' => '/api/v1'], function () {
  Router::get('/', [ExampleApiController::class, 'exampleApiRoute']);
});
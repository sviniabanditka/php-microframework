<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Http\Controllers\ExampleController;

Router::get('/', [ExampleController::class, 'exampleRoute']);
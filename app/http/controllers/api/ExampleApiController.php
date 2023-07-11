<?php
namespace App\Http\Controllers\Api;

class ExampleApiController {
  
  public function exampleApiRoute() 
  {
    return response()->json([
      'success' => true, 
      'message' => 'ExampleApiRoute'
    ]);
  }
}